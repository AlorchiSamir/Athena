<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Tag;
use App\Models\Book;

use Illuminate\Http\Request;

class TagController extends Controller
{
	public function index(){
    	$tags = Tag::all();
    	return view('tags.index', compact('tags'));
    }

    public function view($id){
    	$tag = Tag::find($id);
        $books = $tag->books;
        return view('tags.view', compact('books', 'tag'));
    }

       
}
