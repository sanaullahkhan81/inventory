<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class supplier extends Model
{
    
    static function getSuppliers(){
        $suppliers = DB::table('suppliers')
                ->select('id', 'company', 'first_name','last_name','email_address', 'sup_code', 
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments')
                ->get();
        return $suppliers;
    }
    
    static function getSupplierById($supplierid){
        $customer = DB::table('suppliers')
                ->select('id', 'company', 'first_name','last_name','email_address', 'sup_code', 
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments')
                ->where('id', '=', $supplierid)
                ->get();
        return $customer;
    }
    
    static function addSupplier($firstName, $lastName, $jobTitle, $company, $email, $webPage, 
            $bPhone, $fax, $hPhone, $mPhone, $address, $city, $state, $zip, $country, $notes, $filePath, $supCode){
        
        $id = DB::table('suppliers')->insertGetId(
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
                'attachments' => $filePath,
                'sup_code' => $supCode
                ]
        );
        return $id;
    }
    
    static function updateSupplier($supplierid, $firstName, $lastName, $jobTitle, $company, $email, 
            $webPage, $bPhone, $fax, $hPhone, $mPhone, $address, $city, $state, $zip, $country, $notes, $filePath, $supCode){
        
        $rs = DB::table('suppliers')
            ->where('id', $supplierid)
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
                'attachments' => $filePath,
                'sup_code' => $supCode
                    ]);
        return 1;
    }
}
