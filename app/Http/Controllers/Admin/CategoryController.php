<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Book\Category;
use App\Models\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $categories = Category::all();
    	return view('admin.categories.index', compact('categories'));
    }

    public function create(Request $request){
        $slug = Tools::Slugify($request->name);
        if($request->isMethod('post')){
            $datas = [
                'name' => $request->name,
                'slug' => $slug,
                'color' =>$request->color
            ];
            Category::insert($datas);
            $categories = Category::all();
            return view('admin.categories.index', compact('categories'));
        }
    	return view('admin.categories.create');
    }

    public function view($id){
        $books = Book::where('category_id', '=', $id);
    	return view('admin.book.index');
    }

    public function update($id, Request $request){
        $category = Category::find($id);
        if($request->isMethod('post')){
            $category->name = $request->name;
            $category->color = $request->color;          
            $category->update();
            $categories = Category::all();
            return view('admin.categories.index', compact('categories'));
        }
    	return view('admin.categories.update', compact('category'));
    }
}
