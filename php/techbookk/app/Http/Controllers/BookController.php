<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function home() {
        $book = new Book;
        $book_image = $book::all();
        $book_image = json_decode($book_image, true);
        $a = [];
        $b = [];
        $c = [];
        foreach ($book_image as $book) {
            if ($book['status']=='a') {
                array_push($a, $book);
            } elseif ($book['status']=='b') {
                array_push($b, $book);
            } else {
                array_push($c, $book);
            }
        }
        $book_image = array($a, $b, $c);

        return view('home', compact('book_image'));
    }

    public function details($id) {
        $book = new Book;
        $book_details = $book::where('id', $id)->get();
        $book_details = json_decode($book_details, true)[0];
        return view('details', compact('book_details'));
    }

    public function delete(Request $request) {
        $id = $request->input('id');
        $book = new Book;
        $book::destroy($id);
        return redirect('/');
    }

    public function search(Request $request) {
        $book = $request->input('book');
        $book = preg_replace("/( | )+/u", '+', $book);
        if ($book==null) {
            $book = 'laravel';
        }
        $data1 = "https://www.googleapis.com/books/v1/volumes?q=".$book;
        $data1 = file_get_contents($data1);
        $data1 = json_decode($data1, true)['items'];
        $data = [];
        foreach ($data1 as $d) {
            $title = $d['volumeInfo']['title'];

            if (isset($d['volumeInfo']['authors'])) {
                $author = $d['volumeInfo']['authors'];
                if (is_array($author)) {
                    $author = implode(",", $author);
                }
            } else {
                $author = null;
            }

            if (isset($d['volumeInfo']['publishedDate'])) {
                $publish_date = $d['volumeInfo']['publishedDate'];
                if (strptime($publish_date, '%Y-%m-%d')) {
                    $publish_date = $publish_date;
                } elseif (strptime($publish_date, '%Y-%m')) {
                    $publish_date = $publish_date.'-01';
                } elseif (strptime($publish_date, '%Y')) {
                    $publish_date = $publish_date.'-01-01';
                }
            } else {
                $publish_date = null;
            }

            if (isset($d['volumeInfo']['pageCount'])) {
                $page_count = $d['volumeInfo']['pageCount'];
            } else {
                $page_count = null;
            }

            if (isset($d['volumeInfo']['imageLinks']['smallThumbnail'])) {
                $image_link = $d['volumeInfo']['imageLinks']['smallThumbnail'];
            } else {
                $image_link = asset("/images/noimage.jpg");
            }

            array_push($data, array($title, $author, $publish_date, $page_count, $image_link));
        }
        return view('search', compact('data'));
    }

    public function register(Request $request) {
        $book = [$request->input('title'),$request->input('author'),$request->input('publish_date')];
        $db = new Book;
        $db->title = $request->input('title');
        $db->author = $request->input('author');
        $db->publish_date = $request->input('publish_date');
        $db->page_count = $request->input('page_cnt');
        $db->image_link = $request->input('image_link');
        $db->save();
        return redirect(route('home'));
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $status = $request->input('status');
        $book = Book::where('id', $id)->first();
        if ($status=='読んだ') {
            $book->status = "c";
        } elseif ($status=='読んでいる') {
            $book->status = "b";
        } elseif ($status=='読んでいない') {
            $book->status = "a";
        }
        $book->save();
        return redirect('/');
    }
}
