<?php

namespace App\Models\Book;

use App\Models\Book;
use App\Models\Visit;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

	protected $table = 'book_categories'; 
	public $timestamps = false; 

	public function books(){
	    return $this->hasMany('App\Models\Book');
	} 

  public function getCountVisits(){
    return Visit::where([['content_id', '=', $this->id], ['page', '=', 'category']])->count();
  }

  public static function insert($datas){
  	$category = new self();
  	$category->name = $datas['name'];
    $category->slug = $datas['slug'];
  	$category->color = $datas['color'];
  	$category->save();
  }

  public static function getAll(){
    return self::get();
  }
}