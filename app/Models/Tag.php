<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Visit;

class Tag extends Model{

	protected $table = 'tags';
  public $timestamps = false; 

  public function books(){
    return $this->belongsToMany('App\Models\Book');
  }

	public static function insert($datas){
   		$tag = new self();
   		$tag->name = $datas['name'];
   		$tag->slug = $datas['slug'];
   		$tag->save();
    }

  public function getCountVisits(){
    return Visit::where([['content_id', '=', $this->id], ['page', '=', 'tag']])->count();
  }

  public static function search($query){
      return self::where('name', 'like', '%'.$query.'%')->get();
   }

   public function hashtag(){
      $text = $this->name;
      $words = explode(' ', $text);
      for($i = 0; $i < count($words); $i++){
        $words[$i] = ucfirst($words[$i]);
      }
      $text = implode('', $words);
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
      $text = preg_replace('~[^-\w]+~', '', $text);
      $text = trim($text, ' ');
      if (empty($text)) {
        return 'n-a';
      }
      return $text;
  }
   
}