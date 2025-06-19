<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $tags = Tag::all();
    	return view('admin.tags.index', compact('tags'));
    }

    public function create(Request $request){
        $slug = Tools::Slugify($request->name);
        if($request->isMethod('post')){
            $datas = [
                'name' => $request->name,
                'slug' => $slug
            ];
            Tag::insert($datas);
            $tags = Tag::all();
            return view('admin.tags.index', compact('tags'));
        }
    	return view('admin.tags.create');
    }

    public function view($id){
        $books = Book::where('category_id', '=', $id);
    	return view('admin.book.index');
    }

    public function update($id, Request $request){
        $tag = Tag::find($id);
        $slug = Tools::Slugify($request->name);
        if($request->isMethod('post')){
            $tag->name = $request->name;
            $tag->slug = $tag;          
            $tag->update();
            $tags = Category::all();
            return view('admin.tags.index', compact('tags'));
        }
    	return view('admin.tags.update', compact('tag'));
    }
}
