<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Tools;
use App\Models\Book;
use App\Models\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $authors = Author::all();
    	return view('admin.authors.index', compact('authors'));
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $picture = ($files = $request->file('picture')) ? Tools::UploadImage($files, 'author', $request->name) : '';
            $slug = Tools::Slugify($request->name);
            $datas = [
                'name' => $request->name,
                'slug' => $slug,
                'bio' => $request->bio,
                'picture' => $picture,
                'country' => '',
                'gender' => $request->gender,
                'creator_id' => Auth::user()->id                
            ];
            Author::insert($datas);
            $authors = Author::all();
            return view('admin.authors.index', compact('authors'));
        }
    	return view('admin.authors.create');
    }

    /*public function view($id){
        $books = Book::where('category_id', '=', $id);
    	return view('admin.book.index');
    }*/

    public function update($id, Request $request){
        $author = Author::find($id);
        if($request->isMethod('post')){
            $author->name = $request->name;
            $author->bio = $request->bio;
            $author->gender = $request->gender;      
            $author->update();
            $authors = Author::all();
            return view('admin.authors.index', compact('authors'));
        }
        return view('admin.authors.update', compact('author'));
    }
}