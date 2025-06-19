<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User\Interaction;

use Illuminate\Http\Request;

class InteractionController extends Controller
{

    public function index($type){
        if(in_array(strtoupper($type), Interaction::$types)){
            $user_id = Auth::user()->id;
            $interactions = Interaction::where([['user_id', '=', $user_id], ['type', '=', $type], ['active', '=', 1]])->get();
            $books = array();
            foreach ($interactions as $interaction) {
                array_push($books, $interaction->book);
            }
            return view('books.index', compact('books'));
        }
        else{
            return redirect('/');
        }
        
    }

    public function interaction(){
        
        $book_id = $_POST['book_id'];
        $type = $_POST['type'];
        $user_id = Auth::user()->id;
        switch ($type) {
            case 'like':
                $interaction = Interaction::where([['user_id', '=', $user_id], ['book_id', '=', $book_id], ['type', '=', Interaction::TYPE_LIKE], ['active', '=', 1]])->first();
                if(is_null($interaction)){
                    $datas = [
                        'type' => Interaction::TYPE_LIKE,
                        'user_id' => $user_id,
                        'book_id' => $book_id
                    ];
                    Interaction::insert($datas);
                }                
                break;
            case 'dislike':
                $interaction = $interaction = Interaction::where([['user_id', '=', $user_id], ['book_id', '=', $book_id], ['type', '=', Interaction::TYPE_LIKE], ['active', '=', 1]])->first();
                $interaction->active = 0;
                $interaction->update();
                break;
            case 'interest':
                $interaction = Interaction::where([['user_id', '=', $user_id], ['book_id', '=', $book_id], ['type', '=', Interaction::TYPE_INTEREST], ['active', '=', 1]])->first();
                if(is_null($interaction)){
                    $datas = [
                        'type' => Interaction::TYPE_INTEREST,
                        'user_id' => $user_id,
                        'book_id' => $book_id
                    ];
                    Interaction::insert($datas);
                }                
                break;
            case 'disinterest':
                $interaction = $interaction = Interaction::where([['user_id', '=', $user_id], ['book_id', '=', $book_id], ['type', '=', Interaction::TYPE_INTEREST], ['active', '=', 1]])->first();
                $interaction->active = 0;
                $interaction->update();
                break;
            case 'note':
                if(isset($_POST['note']) && $_POST['note'] > 0 && $_POST['note'] <= 10){
                    $interaction = Interaction::where([['user_id', '=', $user_id], ['book_id', '=', $book_id], ['type', '=', Interaction::TYPE_NOTE], ['active', '=', 1]])->first();
                    if(!is_null($interaction)){
                        $interaction->active = 0;
                        $interaction->update();
                    }
                    $datas = [
                        'type' => Interaction::TYPE_NOTE,
                        'user_id' => $user_id,
                        'book_id' => $book_id,
                        'note' => $_POST['note']
                    ];
                    Interaction::insert($datas);
                }
                break;
        }
        
    }
}
