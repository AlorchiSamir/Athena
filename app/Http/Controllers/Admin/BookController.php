<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Tools;
use App\Models\Book;
use App\Models\Tag;
use App\Models\Language;
use App\Models\Book\Category;
use App\Models\Book\BuyLink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $books = Book::all();
    	return view('admin.books.index', compact('books'));
    }

    public function create(Request $request){

        if($request->isMethod('post')){
            /*request()->validate([
                'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);*/
            $cover = ($files = $request->file('cover')) ? Tools::UploadImage($files, 'book', $request->title) : '';
            $slug = Tools::Slugify($request->title);
           
            $datas = [
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'cover' => $cover,
                'release_date' => Tools::DateFormat($request->release_date),
                'language_id' => $request->language,
                'status' => Book::STATUS_ACCEPTED,
                'pages' => $request->pages,
                'category_id' => $request->category,
                'creator_id' => Auth::user()->id,
                'authors' => $request->author,
                'tags' => $request->tag,
                'translated' => (isset($request->translated)) ? true : false
            ];
            Book::insert($datas);
            $books = Book::all();
            return view('admin.books.index', compact('books'));
        }
        $categories = Category::all();
        $tags = Tag::all();
        $languages = Language::all();
    	return view('admin.books.create', compact('categories', 'tags', 'languages'));
    }

    public function view($id){
        $book = Book::find($id);
    	return view('admin.books.view', compact('book'));
    }

    public function update($id, Request $request){
        $book = Book::find($id);
        if($request->isMethod('post')){
            $book->title = $request->title;
            $book->description = $request->description;
            $book->category_id = $request->category;
            $book->pages = $request->pages;
            $book->release_date = $request->release_date;          
            $book->update();
            $books = Book::all();
            return view('admin.books.index', compact('books'));
        }
        $categories = Category::all();
    	return view('admin.books.update', compact('book', 'categories'));
    }

    public function status($status, $id){
        if(in_array(strtoupper($status), Book::$status)){            
            $book = Book::find($id);
            $book->status = strtoupper($status);            
            $book->update();
        }        
        return view('admin.books.view', compact('book'));
    }

    public function buylink(Request $request){        
        if($request->isMethod('post')){
            $buylink = new BuyLink();
            $buylink->book_id = $request->book_id;
            $buylink->link = $request->link;
            $buylink->save();
            $book = Book::find($request->book_id);
            return view('admin.books.view', compact('book'));
        }
    }

    public function cover(Request $request){
        if($request->isMethod('post')){
            $cover = ($files = $request->file('cover')) ? Tools::UploadImage($files, 'book') : '';
            $book = Book::find($request->book_id);
            $book->cover = $cover;
            $book->update();
            $book = Book::find($request->book_id);
            return view('admin.books.view', compact('book'));
        }
    }
}
