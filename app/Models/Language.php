<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Visit;

class Language extends Model{

	protected $table = 'languages';
  public $timestamps = false; 

  public function books(){
      return $this->hasMany('App\Models\Book');
  } 

	/*public static function insert($datas){
   		$tag = new self();
   		$tag->name = $datas['name'];
   		$tag->slug = $datas['slug'];
   		$tag->save();
    }*/
   
}