<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Request extends Model{

	protected $table = 'user_requests'; 

  const STATUS_ACCEPTED = '2';
  const STATUS_IN_WAIT = '1';
  const STATUS_CANCEL = '0';

  public static $status = [
    self::STATUS_ACCEPTED,
    self::STATUS_IN_WAIT,
    self::STATUS_CANCEL
  ];

	public function user(){
    return $this->belongsTo('App\Models\User');
  }  

  public static function insert($datas){
      $request = new self();      
      $request->user_id = $datas['user_id'];
      $request->book = $datas['book'];
      $request->author = $datas['author'];
      $request->status = self::STATUS_IN_WAIT;
      $request->save();
    }   
}