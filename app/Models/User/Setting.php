<?php

namespace App\Models\User;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model{

	protected $table = 'user_settings'; 

  const SETTING_AVATAR = 'avatar';
  const SETTING_SEARCH = 'search';

  public static $settings = [
    self::SETTING_AVATAR,
    self::SETTING_SEARCH
  ];

  public function user(){
    return $this->belongsTo('App\Models\User');
  }

  public static function updateSettings($datas){
    $user_id = Auth::user()->id;
    foreach ($datas as $key => $data) {
      if(in_array($key, self::$settings)){
        $setting = Setting::where([['user_id', '=', $user_id], ['setting', '=', $key]])->first();
        if(is_null($setting)){
          $set_datas = [
            'setting' => $key,
            'user_id' => $user_id,
            'value' => $data
          ];
          Setting::insert($set_datas);
        }
        
          elseif($setting->value != $data){
            $setting->value = $data;
            $setting->update();
          
        }        
      }
    }
  }
	
}