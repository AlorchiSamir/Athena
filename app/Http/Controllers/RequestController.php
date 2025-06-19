<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\Author;
use App\Models\User\Request as User_request;
use App\Models\Tools\Message;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function send(Request $request){  
    	if($request->isMethod('post')){  
            $datas = [                
                'book' => $request->title,
                'author' => $request->author,
                'user_id' => Auth::user()->id
            ];
            User_request::insert($datas);   
            Message::getInstance()->add('La requête a bien été envoyée', 1);             
        }        
        return redirect('/');
    }

       
}
