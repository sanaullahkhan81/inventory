<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class shipper extends Model
{
    
    static function getShippers(){
        $shippers = DB::table('shippers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments')
                ->get();
        return $shippers;
    }
    
    static function getShipperById($shipperid){
        $customer = DB::table('shippers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments')
                ->where('id', '=', $shipperid)
                ->get();
        return $customer;
    }
    
    static function addShipper($firstName, $lastName, $jobTitle, $company, $email, $webPage, 
            $bPhone, $fax, $hPhone, $mPhone, $address, $city, $state, $zip, $country, $notes, $filePath){
        
        $id = DB::table('shippers')->insertGetId(
            ['first_name' => $firstName, 
                'last_name' => $lastName, 
                'job_title'=> $jobTitle, 
                'company' => $company, 
                'email_address' => $email,
                'web_page' => $webPage,
                'business_phone' => $bPhone,
                'fax_number' => $fax,
                'home_phone' => $hPhone, 
                'mobile_phone' => $mPhone, 
                'address'=> $address, 
                'city' => $city, 
                'state' => $state,
                'zip' => $zip,
                'country' => $country,
                'notes' => $notes,
                'attachments' => $filePath
                ]
        );
        return $id;
    }
    
    static function updateShipper($shipperid, $firstName, $lastName, $jobTitle, $company, $email, 
            $webPage, $bPhone, $fax, $hPhone, $mPhone, $address, $city, $state, $zip, $country, $notes,$filePath){
        
        DB::table('shippers')
            ->where('id', $shipperid)
            ->update(['first_name' => $firstName, 
                'last_name' => $lastName, 
                'job_title'=> $jobTitle, 
                'company' => $company, 
                'email_address' => $email,
                'web_page' => $webPage,
                'business_phone' => $bPhone,
                'fax_number' => $fax,
                'home_phone' => $hPhone, 
                'mobile_phone' => $mPhone, 
                'address'=> $address, 
                'city' => $city, 
                'state' => $state,
                'zip' => $zip,
                'country' => $country,
                'notes' => $notes,
                'attachments' => $filePath
                    ]);
    }
}
