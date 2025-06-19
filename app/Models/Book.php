<?php

namespace App\Models;

use App\Models\Book\Category;
use App\Models\Book\Comment;
use App\Models\User\Interaction;
use App\Models\Visit;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{

	protected $table = 'books';

   const STATUS_ACCEPTED = 'ACCEPTED';
   const STATUS_IN_WAIT = 'IN_WAIT';
   const STATUS_CLOSED = 'CLOSED';

   public static $status = [
      self::STATUS_ACCEPTED,
      self::STATUS_IN_WAIT,
      self::STATUS_CLOSED
   ];

	public function category(){
		return $this->belongsTo('App\Models\Book\Category');
	}

   public function creator(){
      return $this->belongsTo('App\Models\User');
   }

   public function language(){
      return $this->belongsTo('App\Models\Language');
   }

   public function buylinks(){
      return $this->hasMany('App\Models\Book\BuyLink');
   }

   public function comments(){
       return $this->hasMany('App\Models\Book\Comment');
   } 

   public function authors(){
      return $this->belongsToMany('App\Models\Author');
   }

   public function tags(){
      return $this->belongsToMany('App\Models\Tag');
   } 

   public function likes(){
      return Interaction::where([['book_id', '=', $this->id], ['type', '=', Interaction::TYPE_LIKE], ['active', '=', 1]])->count();
   }

   public function interests(){
      return Interaction::where([['book_id', '=', $this->id], ['type', '=', Interaction::TYPE_INTEREST], ['active', '=', 1]])->count();
   }

   public function averageNote(){
      $notes = Interaction::where([['book_id', '=', $this->id], ['type', '=', Interaction::TYPE_NOTE], ['active', '=', 1]])->get();
      if(count($notes) > 0){
         $n = 0;
         $total = 0;
         foreach ($notes as $note) {
            $total += $note->note;
            $n++;
         }
         return $total/$n;
      }
      else{
         return null;
      }
   }

   public function getCover(){
      return ($this->cover != '') ? $this->cover : 'default.jpg';
   }

   public function getCountVisits(){
      return Visit::where([['content_id', '=', $this->id], ['page', '=', 'book']])->count();
   }

   public function isLiked($user_id){
      $interaction = Interaction::where([['user_id', '=', $user_id], ['book_id', '=', $this->id], ['type', '=', Interaction::TYPE_LIKE], ['active', '=', 1]])->first();
      return (is_null($interaction)) ? false : true;
   }

   public function isInterested($user_id){
      $interaction = Interaction::where([['user_id', '=', $user_id], ['book_id', '=', $this->id], ['type', '=', Interaction::TYPE_INTEREST], ['active', '=', 1]])->first();
      return (is_null($interaction)) ? false : true;
   }

   public function note($user_id){
      $interaction = Interaction::where([['user_id', '=', $user_id], ['book_id', '=', $this->id], ['type', '=', Interaction::TYPE_NOTE], ['active', '=', 1]])->first();
      return (is_null($interaction)) ? 0 : $interaction->note;
   }

   public function getAverageScore(){
        $sum = Interaction::where('book_id', '=', $this->id)->where('type', '=', Interaction::TYPE_NOTE)->where('active', '=', 1)->sum('note');
        $notes = Interaction::where('book_id', '=', $this->id)->where('type', '=', Interaction::TYPE_NOTE)->where('active', '=', 1)->count();        
        return ($notes > 0) ? $sum/$notes : null;       
    }

   public function alreadyCommented($user_id){
      $comment = Comment::where([['user_id', '=', $user_id], ['book_id', '=', $this->id], ['active', '=', 1]])->first();
      return (is_null($comment)) ? false : true;
   }

	public static function insert($datas){
   	$book = new self();
   	$book->title = $datas['title'];
      $book->slug = $datas['slug'];
   	$book->description = (!is_null($datas['description'])) ? $datas['description'] : '';
   	$book->cover = $datas['cover'];
   	$book->release_date = $datas['release_date'];
   	$book->language_id = (!is_null($datas['language_id'])) ? $datas['language_id'] : '';
   	$book->status = (in_array($datas['status'], self::$status)) ? $datas['status'] : self::STATUS_IN_WAIT;
   	$book->pages = (!is_null($datas['pages'])) ? $datas['pages'] : 0;
   	$book->category_id = $datas['category_id'];
   	$book->creator_id = $datas['creator_id'];
      $book->translated = $datas['translated'];
      $book->save();

      foreach ($datas['authors'] as $author) {
         $book->authors()->attach($author);
      } 
      foreach ($datas['tags'] as $tag => $value) {
         $book->tags()->attach($tag);
      }  		
   }

   public static function search($query){
      return self::where('title', 'like', '%'.$query.'%')->get();
   }
   
}