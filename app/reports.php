<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class reports extends Model
{
    static function getMinMaxYears(){
        $orderYears = DB::table('orders')
            ->select(DB::raw('min(YEAR(order_date)) as min_year, max(YEAR(order_date)) as max_year'))
            ->get();
        return $orderYears;
    }
    
    static function getSaleCountries(){
        $orderYears = DB::table('orders')
            ->select(DB::raw('ship_country'))
            ->distinct()
            ->get();
        return $orderYears;
    }
    
//=============================================================================================
    
    static function getCustomers(){
        $customers = DB::table('customers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments', 
                  'customer_name')
                ->orderBy('last_name','asc')
                ->get();
        return $customers;
    }
    
    static function getCustomerById($customerid){
        $customers = DB::table('customers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments', 
                  'customer_name')
                ->where('id', '=', $customerid)
                ->get();
        return $customers;
    }	 	 	
    
    static function getSuppliers(){
        $suppliers = DB::table('suppliers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments', 
                  'supplier_name')
                ->orderBy('company','asc')
                ->get();
        return $suppliers;
    }
    
    static function getSupplierById($supplierid){
        $suppliers = DB::table('suppliers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments', 
                  'supplier_name')
                ->where('id', '=', $supplierid)
                ->get();
        return $suppliers;
    }
    
    static function getActiveOrders($startDate, $endDate){
        $activeOrders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.employee_id')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->select('orders.id', 'orders.order_date', 'orders.status',
                    'users.name', 'customers.customer_name', 'customers.company',
                    'orders.order_sub_total', 'orders.order_total', 'orders.currency_value',
                    DB::raw('sum(order_details.quantity) as orderQuantity'),
                    DB::raw("IF(orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
            ->whereIn('orders.status_id', [0, 10, 20])
            ->whereBetween('orders.order_date', [$startDate, $endDate])
            ->orderBy('order_date','asc')
            ->groupBy('orders.id')
            ->get();
        return $activeOrders;
    }
    
    static function getSalesByMonths($year, $months, $group, $filter){
       $sales = [];
       
       if($group == 1)
       {
           if($filter == 0)
           {
               $sales = DB::table('categories')
                ->join('products', 'products.category_id', '=', 'categories.id') 
                ->join('order_details', 'order_details.product_id', '=', 'products.id') 
                ->join('orders', 'orders.id', '=', 'order_details.order_id') 
                       
                ->select('categories.id', 'categories.category as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(order_details.extended_price) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('categories.id, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('categories.id, MONTH(orders.order_date)'),'asc')      
                ->get();
           }
           else
           {
               $sales = DB::table('categories')
                ->join('products', 'products.category_id', '=', 'categories.id') 
                ->join('order_details', 'order_details.product_id', '=', 'products.id') 
                ->join('orders', 'orders.id', '=', 'order_details.order_id') 
                       
                ->select('categories.id', 'categories.category as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(order_details.extended_price) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->where('categories.id', '=', $filter)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('categories.id, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('categories.id, MONTH(orders.order_date)'),'asc')      
                ->get();
           }
       }
       else if($group == 2)
       {
           if($filter == '0')
           {
               $sales = DB::table('orders')
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->select('orders.ship_country as id', 'orders.ship_country as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('orders.ship_country, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('orders.ship_country, MONTH(orders.order_date)'),'asc')      
                ->get();
           }
           else
           {
               $sales = DB::table('orders')
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->select('orders.ship_country as id', 'orders.ship_country as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->where('orders.ship_country', '=', $filter)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('orders.id, orders.ship_country, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('orders.ship_country, MONTH(orders.order_date)'),'asc')      
                ->get();
           }
       }
       else if($group == 3)
       {
           if($filter == 0)
           {
               $sales = DB::table('customers')
                ->join('orders', 'orders.customer_id', '=', 'customers.id') 
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')       
                ->select('customers.id', 'customers.customer_name as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('customers.id, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('customers.id, MONTH(orders.order_date)'),'asc')      
                ->get();
           }
           else
           {
               $sales = DB::table('customers')
                ->join('orders', 'orders.customer_id', '=', 'customers.id') 
                ->join('order_details', 'order_details.order_id', '=', 'orders.id') 
                ->select('customers.id', 'customers.customer_name as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->where('customers.id', '=', $filter)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('customers.id, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('customers.id, MONTH(orders.order_date)'),'asc')      
                ->get();
           }
       }
       else if($group == 4)
       {
           if($filter == 0)
           {
               $sales = DB::table('users')
                ->join('orders', 'orders.employee_id', '=', 'users.id')  
                ->join('order_details', 'order_details.order_id', '=', 'orders.id') 
                ->select('users.id', 'users.name as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('users.id, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('users.id, MONTH(orders.order_date)'),'asc')      
                ->get();
            }
           else
           {
               $sales = DB::table('users')
                ->join('orders', 'orders.employee_id', '=', 'users.id')  
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')        
                ->select('users.id', 'users.name as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->where('users.id', '=', $filter)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('users.id, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('users.id, MONTH(orders.order_date)'),'asc')      
                ->get();
            }
        }
        else if($group == 5)
       {
           if($filter == 0)
           {
               $sales = DB::table('products') 
                ->join('order_details', 'order_details.product_id', '=', 'products.id') 
                ->join('orders', 'orders.id', '=', 'order_details.order_id') 
                       
                ->select('products.id', 'products.product_name as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(order_details.extended_price) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('products.id, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('products.id, MONTH(orders.order_date)'),'asc')      
                ->get();
            }
           else
           {
               $sales = DB::table('products') 
                ->join('order_details', 'order_details.product_id', '=', 'products.id') 
                ->join('orders', 'orders.id', '=', 'order_details.order_id') 
                       
                ->select('products.id', 'products.product_name as group_name', 
                        DB::raw('MONTH(orders.order_date) as month'),
                        DB::raw('SUM(order_details.extended_price) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))
                       
                ->where('orders.status_id', '=', 30)
                ->where('products.id', '=', $filter)
                ->whereIn(DB::raw('MONTH(orders.order_date)'), $months)
                ->whereYear('orders.order_date', $year)
                ->groupBy(DB::raw('products.id, MONTH(orders.order_date)'))
                ->orderBy(DB::raw('products.id, MONTH(orders.order_date)'),'asc')      
                ->get();
            }
       }
       return $sales;
    }
    static function getMonthlySales($year, $month, $group, $filter){
        $sales = [];
        
        if($group == 1)
        {
            if($filter == 0)
            {
               $sales = DB::table('categories')
                ->join('products', 'products.category_id', '=', 'categories.id') 
                ->join('order_details', 'order_details.product_id', '=', 'products.id') 
                ->join('orders', 'orders.id', '=', 'order_details.order_id') 
                ->select('categories.category as group_name', DB::raw('SUM(order_details.extended_price) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('categories.id')
                ->orderBy('categories.category','asc')
                ->get(); 
            }
            else
            {
                $sales = DB::table('categories')
                ->join('products', 'products.category_id', '=', 'categories.id') 
                ->join('order_details', 'order_details.product_id', '=', 'products.id') 
                ->join('orders', 'orders.id', '=', 'order_details.order_id') 
                ->select('categories.category as group_name', DB::raw('SUM(order_details.extended_price) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->where('categories.id', '=', $filter)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('categories.id')
                ->orderBy('categories.category','asc')
                ->get();
            }
            
        }
        else if($group == 2)
        {
            if($filter == '0')
            {
               $sales = DB::table('orders') 
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->select('orders.ship_country as group_name', DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('orders.ship_country')
                ->orderBy('orders.ship_country','asc')
                ->get(); 
            }
            else
            {
               $sales = DB::table('orders') 
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->select('orders.ship_country as group_name', DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->where('orders.ship_country', '=', $filter)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('orders.ship_country')
                ->orderBy('orders.ship_country','asc')
                ->get(); 
            }
        }
        else if($group == 3)
        {
            if($filter == 0)
            {
               $sales = DB::table('customers') 
                ->join('orders', 'orders.customer_id', '=', 'customers.id') 
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->select('customers.customer_name as group_name', DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('customers.id')
                ->orderBy('customers.customer_name','asc')
                ->get(); 
            }
            else
            {
               $sales = DB::table('customers') 
                ->join('orders', 'orders.customer_id', '=', 'customers.id') 
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->select('customers.customer_name as group_name', DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->where('customers.id', '=', $filter)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('customers.id')
                ->orderBy('customers.customer_name','asc')
                ->get(); 
            }
        }
        else if($group == 4)
        {
            if($filter == 0)
            {
               $sales = DB::table('users') 
                ->join('orders', 'orders.employee_id', '=', 'users.id') 
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->select('users.name as group_name', DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('users.id')
                ->orderBy('users.name','asc')
                ->get(); 
            }
            else
            {
               $sales = DB::table('users') 
                ->join('orders', 'orders.employee_id', '=', 'users.id') 
                ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                ->select('users.name as group_name', DB::raw('SUM(orders.order_total) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->where('users.id', '=', $filter)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('users.id')
                ->orderBy('users.name','asc')
                ->get();
            }
        }
        else if($group == 5)
        {
            if($filter == 0)
            {
                $sales = DB::table('products')
                ->join('order_details', 'order_details.product_id', '=', 'products.id') 
                ->join('orders', 'orders.id', '=', 'order_details.order_id') 
                ->select('products.product_name as group_name', DB::raw('SUM(order_details.extended_price) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('products.id')
                ->orderBy('products.product_name','asc')
                ->get(); 
            }
            else
            {
                $sales = DB::table('products')
                ->join('order_details', 'order_details.product_id', '=', 'products.id') 
                ->join('orders', 'orders.id', '=', 'order_details.order_id') 
                ->select('products.product_name as group_name', DB::raw('SUM(order_details.extended_price) as price'),
                        DB::raw('SUM(order_details.quantity) as quantity'))  
                ->where('orders.status_id', '=', 30)
                ->where('products.id', '=', $filter)
                ->whereYear('orders.order_date', $year)
                ->whereMonth('orders.order_date', $month)
                ->groupBy('products.id')
                ->orderBy('products.product_name','asc')
                ->get(); 
            }
            
        }
        return $sales;
    }
    
}
