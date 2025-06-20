<?php

namespace App\Models;

use App\Models\User\Setting;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books(){
        return $this->hasMany('App\Models\Book');
    } 

    public function authors(){
        return $this->hasMany('App\Models\Author');
    } 

    public function comments(){
       return $this->hasMany('App\Models\Book\Comment');
   } 

   public function settings(){
        return $this->hasMany('App\Models\User\Setting');
    } 

    public function getAvatar(){
        $setting = Setting::where([['user_id', '=', $this->id], ['setting', '=', Setting::SETTING_AVATAR]])->first();
        return (!is_null($setting)) ? $setting->value : 'default.jpg';
    }
}
