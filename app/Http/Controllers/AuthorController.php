<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Author;
use App\Models\Book;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
	public function index(){
    	$authors = Author::all();
    	return view('authors.index', compact('authors'));
    }

    public function view($id){
    	$author = Author::find($id);
        $books = $author->books;
        return view('authors.view', compact('books', 'author'));
    }

    public function ajaxList(){
    	$search = $_POST['search'];
    	$authors = Author::where('name', 'like', '%'.$search.'%')->get();
    	return view('authors.ajax.list', compact('authors'));
    }

    public function ajaxAuthor(){
        $id = $_POST['id'];
        $author = Author::find($id);
        return view('authors.ajax.author', compact('author'));
    }


   
}
