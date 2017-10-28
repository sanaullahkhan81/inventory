<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class settings extends Model
{
    
    static function getSettings(){
        $users = DB::table('settings')
                ->select('id', 
                        'bill_address', 'bill_city', 'bill_state', 'bill_zip', 'bill_country', 
                        'ship_address', 'ship_city', 'ship_state', 'ship_zip', 'ship_country')
                ->first();
        return $users;
    }	 	 	 	 	 	 	 	 	 	 
    
    static function addSettings($bill_address, $bill_city, $bill_state, $bill_zip, $bill_country, 
                        $ship_address, $ship_city, $ship_state, $ship_zip, $ship_country){
        
        
        $id = DB::table('settings')->insertGetId(
            [
                'bill_address' => $bill_address, 
                'bill_city' => $bill_city, 
                'bill_state' => $bill_state,  
                'bill_zip' => $bill_zip,
                'bill_country' => $bill_country,
                'ship_address' => $ship_address,
                'ship_city' => $ship_city,
                'ship_state' => $ship_state,
                'ship_zip' => $ship_zip, 
                'ship_country' => $ship_country
                ]
        );
        return $id;
    }
    
    static function updateSettings($sid, $bill_address, $bill_city, $bill_state, $bill_zip, $bill_country, 
                        $ship_address, $ship_city, $ship_state, $ship_zip, $ship_country){
        
        DB::table('settings')
            ->where('id', $sid)
            ->update([
                'bill_address' => $bill_address, 
                'bill_city' => $bill_city, 
                'bill_state' => $bill_state,  
                'bill_zip' => $bill_zip,
                'bill_country' => $bill_country,
                'ship_address' => $ship_address,
                'ship_city' => $ship_city,
                'ship_state' => $ship_state,
                'ship_zip' => $ship_zip, 
                'ship_country' => $ship_country
                    ]);
        return $sid;
    }	 	 	 	 	 	 	 	 	 	 
    
}
