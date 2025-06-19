<?php

namespace App\Models;

use Image;

class Tools{

	public static function DateFormat($date){
		return (!is_null($date)) ? date('Y-m-d', strtotime($date)) : null;
    }

    public static function UploadImage($files, $folder = '', $name = null, $dim = 50){
        $path = 'public/images/'.$folder.'/'; // upload path
        if(is_null($name)){
          $img_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
        }
        else{
          $img_name = self::slugify($name) . "." . $files->getClientOriginalExtension();
        }
      	
      	$files->move($path, $img_name); 

        $img = Image::make($path.$img_name);
      	$croppath = 'public/images/'.$folder.'/crop/'.$img_name;
      	$img->fit($dim);
        $img->save($croppath);
 

      	return $img_name;
    }

    public static function slugify($text){
    	$text = preg_replace('~[^\pL\d]+~u', '-', $text);
    	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '-');
		$text = preg_replace('~-+~', '-', $text);
		$text = strtolower($text);
		if (empty($text)) {
			return 'n-a';
		}
		return $text;
	}

	  
}