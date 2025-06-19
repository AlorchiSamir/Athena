<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model{

	protected $table = 'visits';

   const PAGE_BOOK = 'BOOK';

   public static $pages = [
      self::PAGE_BOOK
   ];	

	public static function insert($datas){
   		$visit = new self();
   		$visit->user_id = $datas['user_id'];
   		$visit->page =  $datas['page'];
   		$visit->content_id = $datas['content_id'];
         $visit->count = $datas['count'];
   		$visit->save();
    }
   
}