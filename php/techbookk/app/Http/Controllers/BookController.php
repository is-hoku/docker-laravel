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
        return view('home', compact('book_image'));
    }

    public function details($id) {
        $book = new Book;
        $book_details = $book::where('id', $id)->get();
        $book_details = json_decode($book_details, true)[0];
        return view('details', compact('book_details'));
    }

    public function delete($id) {
        $book = new Book;
        $book::destroy($id);
        return redirect('/');
    }

    public function search(Request $request) {
        $book = $request->input('book');
        $data = "https://www.googleapis.com/books/v1/volumes?q=".$book;
        $data = file_get_contents($data);
        $data = json_decode($data, true)['items'];
        var_dump($data);
        return view('search', compact('data'));
    }
}
