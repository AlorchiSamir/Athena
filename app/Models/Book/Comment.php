<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{

	protected $table = 'book_comments';

	public function book(){
    return $this->belongsTo('App\Models\Book');
  }

  public function user(){
    return $this->belongsTo('App\Models\User');
  }

  public static function insert($datas){
    $comment = new self();
   	$comment->user_id = $datas['user_id'];
    $comment->book_id = $datas['book_id'];
    $comment->active = 1;
   	$comment->content = $datas['content'];
   	$comment->save();
  }
}