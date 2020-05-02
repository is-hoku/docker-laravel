<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    public function home() {
//        if ($year==null){
//            $year = date('Y');
//        }
        $book = new Book;
        $book_image = $book::all();
        $book_image = json_decode($book_image, true);
        #var_dump($book_image);
        #$book_image = array_column($book_image, 'image_link');
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
}
