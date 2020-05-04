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
        return view('home', compact('book_image'));
    }
    public function details() {
    }
}
