<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User\Setting;
use App\Models\Tools;

use Illuminate\Http\Request;

class SettingController extends Controller
{

	public function __construct(){
    	$this->middleware('auth');
	}

    public function index(Request $request){ 
   		if($request->isMethod('post')){
            $avatar = ($files = $request->file('avatar')) ? Tools::UploadImage($files, 'avatar') : '';
                   
            $datas = [
                Setting::SETTING_AVATAR => $avatar             
            ];
            Setting::updateSettings($datas);            
        }   
    	$settings = array();	
    	return view('settings.index', compact('settings'));
    }
       
}
