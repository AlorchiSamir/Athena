<?php

namespace App\Http\Controllers\Admin;

use App\Models\User\Request as User_request;
use App\Models\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $requests = User_request::all();
        $requests_inwait = User_request::where('status', '=', User_request::STATUS_IN_WAIT)->get();
        $requests_valid = User_request::where('status', '=', User_request::STATUS_ACCEPTED)->get();
        $requests_cancel = User_request::where('status', '=', User_request::STATUS_CANCEL)->get();
       
    	return view('admin.requests.index', compact('requests_inwait', 'requests_valid', 'requests_cancel'));
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

    public function valid($id){
        $request = User_request::find($id);
        $request->status = User_request::STATUS_ACCEPTED;
        $request->update();
        return redirect('admin/request');
    }

    public function cancel($id){
        $request = User_request::find($id);
        $request->status = User_request::STATUS_CANCEL;
        $request->update();
        return redirect('admin/request');
    }
}
