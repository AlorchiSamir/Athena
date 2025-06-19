<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\Book\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function insert(Request $request){ 
        $book_id = $request->book_id;
        $book = Book::find($book_id);
        $datas = [
            'user_id' => Auth::user()->id,
            'book_id' => $book_id,
            'content' => $request->content
        ];
        Comment::insert($datas);
        return redirect('book/'.$book_id.'/'.$book->slug);      
    }
}
