<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    public function home($year=null) {
        if ($year==null){
            $year = date('Y');
        }
        $book = new Book;
        $book_image = $book::all();
        $book_image = json_decode($book_image, true);
        #var_dump($book_image);
        #$book_image = array_column($book_image, 'image_link');
        return view('home', compact('book_image'));
    }
    public function details() {
    }
}
