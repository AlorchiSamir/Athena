<?php

namespace App\Models\Book;

use App\Models\Book;

use Illuminate\Database\Eloquent\Model;

class BuyLink extends Model{

	protected $table = 'book_buylinks';

	public function book(){
		return $this->belongsTo('App\Models\Book');
	}
  
	public static function insert($datas){
   		/*$book = new self();
   		$book->title = $datas['title'];
   		$book->description = (!is_null($datas['description'])) ? $datas['description'] : '';
   		$book->cover = $datas['cover'];
   		$book->release_date = $datas['release_date'];
   		$book->country = (!is_null($datas['country'])) ? $datas['country'] : '';
   		$book->status = (in_array($datas['status'], self::$status)) ? $datas['status'] : self::STATUS_IN_WAIT;
   		$book->pages = (!is_null($datas['pages'])) ? $datas['pages'] : 0;
   		$book->category_id = $datas['category_id'];
   		$book->creator_id = $datas['creator_id'];
   		$book->save();*/
    }
   
}