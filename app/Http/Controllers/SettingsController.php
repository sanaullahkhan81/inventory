<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\settings;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function checkUserPermission()
    {
        if(Auth::user()->user_type != 1)
        {
            //abort(403, 'oo jaaa');
            abort(404, "You don't have permission of this page.");
            exit();
        }
    }
    
    public function getSettings(){
        self::checkUserPermission();
        
        $setting = settings::getSettings();
        $page = 'settings';
        return view('settings', compact('page', 'setting'));
    }
    
    public function saveSettings() {
        self::checkUserPermission();
        
        $bill_address = Input::get('bill_address');
        $bill_city = Input::get('bill_city');
        $bill_state = Input::get('bill_state');
        $bill_zip = Input::get('bill_zip');
        $bill_country = Input::get('bill_country');
        $ship_address = Input::get('ship_address');
        $ship_city = Input::get('ship_city');
        $ship_state = Input::get('ship_state');
        $ship_zip = Input::get('ship_zip');
        $ship_country = Input::get('ship_country');
        
        $res = 0;
        
        $settings = settings::getSettings();
        
        if(count($settings) == 0)
        {
            $res = settings::addSettings($bill_address, $bill_city, $bill_state, $bill_zip, $bill_country, 
                        $ship_address, $ship_city, $ship_state, $ship_zip, $ship_country);
        }
        else
        {
            $res = settings::updateSettings($settings->id, $bill_address, $bill_city, $bill_state, 
                    $bill_zip, $bill_country, $ship_address, $ship_city, $ship_state, $ship_zip, $ship_country);
        }
        
        echo $res; 
    }
    
    
}
