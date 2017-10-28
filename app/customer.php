<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class customer extends Model
{
    static function getCustomers(){
        $customers = DB::table('customers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments', 'customer_name')
                ->get();
        return $customers;
    }
    
    static function getCustomerById($customerid){
        $customer = DB::table('customers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments', 'customer_name')
                ->where('id', '=', $customerid)
                ->get();
        return $customer;
    }
    
    static function addCustomer($firstName, $lastName, $jobTitle, $company, $email, $webPage, 
            $bPhone, $fax, $hPhone, $mPhone, $address, $city, $state, $zip, $country, $notes, $filePath){
        
        $id = DB::table('customers')->insertGetId(
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
                'customer_name' => $firstName.' '.$lastName
                ]);
        return $id;
    }
    
    static function updateCustomer($customerid, $firstName, $lastName, $jobTitle, $company, $email, $webPage, 
            $bPhone, $fax, $hPhone, $mPhone, $address, $city, $state, $zip, $country, $notes, $filePath){
        
        DB::table('customers')
            ->where('id', $customerid)
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
                'customer_name' => $firstName.' '.$lastName
                    ]);
        return $customerid;
    }
    
    static function getInvoiceByOrderId($orderid, $orderType = 'CO'){
        $invoice = DB::table('invoices')
                ->select('id', 'invoice_date', 'due_date','tax','shipping',
                  'order_id','sub_total','amount_due','created_date')
                ->where('order_id', '=', $orderid)
                ->where('order_type', '=', $orderType)
                ->get();
        return $invoice;
    }
    //  	 	 	 	 	 Ascending 1 	 	 	
}
