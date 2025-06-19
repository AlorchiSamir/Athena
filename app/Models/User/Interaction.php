<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model{

	protected $table = 'book_user_interactions'; 

  const TYPE_LIKE = 'LIKE';
  const TYPE_INTEREST = 'INTEREST';
  const TYPE_NOTE = 'NOTE';

  public static $types = [
    self::TYPE_LIKE,
    self::TYPE_INTEREST,
    self::TYPE_NOTE,
  ];

	public function book(){
    return $this->belongsTo('App\Models\Book');
  }  

  public static function insert($datas){
      $interaction = new self();
      $interaction->type = $datas['type'];
      $interaction->user_id = $datas['user_id'];
      $interaction->book_id = $datas['book_id'];
      $interaction->active = 1;
      $interaction->note = (isset($datas['note'])) ? $datas['note'] : null;
      $interaction->save();
    }   
}