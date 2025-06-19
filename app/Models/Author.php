<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model{

	protected $table = 'authors';

	public function getPicture(){
      return ($this->picture != '') ? $this->picture : 'default.jpg';
    }

    public function creator(){
      return $this->belongsTo('App\Models\User');
    }

    public function books(){
      return $this->belongsToMany('App\Models\Book');
    }

	public static function insert($datas){
   		$author = new self();
   		$author->name = $datas['name'];
      $author->slug = $datas['slug'];
   		$author->bio = (!is_null($datas['bio'])) ? $datas['bio'] : '';
   		$author->picture = $datas['picture'];
   		$author->country = (!is_null($datas['country'])) ? $datas['country'] : '';   		
   		$author->gender = $datas['gender'];
   		$author->creator_id = $datas['creator_id'];
   		$author->save();
    }

  public static function search($query){
      return self::where('name', 'like', '%'.$query.'%')->get();
   }
   
}