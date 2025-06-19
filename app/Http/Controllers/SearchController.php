<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($query){  
    	$books = Book::search($query);
    	$authors = Author::search($query);
    	return view('search.index', compact('query', 'books', 'authors'));
    }
       
}
