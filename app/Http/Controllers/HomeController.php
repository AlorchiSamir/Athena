<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    
    public function index(){
        $book = Book::inRandomOrder()->first();
        $last_books = Book::orderBy('created_at', 'desc')->limit(6)->get();
        return view('home.index', compact('book', 'last_books'));
    }
}
