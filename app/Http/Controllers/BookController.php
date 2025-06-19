<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book\Category;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
    	$books = Book::where('status', '=', Book::STATUS_ACCEPTED)->get();
    	return view('books.index', compact('books'));
    }

    public function view($id){
    	$book = Book::find($id);
    	return view('books.view', compact('book'));
    }

    public function category($id){
        $category = Category::find($id);
    	$books = Book::where([['status', '=', Book::STATUS_ACCEPTED], ['category_id', '=', $id]])->get();
    	return view('books.index', compact('books', 'category'));
    }

   

    
}
