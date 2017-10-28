<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    //
    
    static function getDashboardData(){
        $activeOrders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.employee_id')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('orders.id', 'orders.order_date', 'orders.status',
                    'users.name', 'customers.customer_name', 'customers.company',
                    'orders.order_sub_total', 'orders.order_total', 'orders.currency_value', 
                    DB::raw("IF(orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
            ->whereIn('orders.status_id', [0, 10, 20])
            ->get();
        $InvToReOrder = DB::table('inventory')
            ->join('products', 'products.id', '=', 'inventory.product_id')
            ->select('inventory.id', 'inventory.product_id', 'products.product_name',
                    'inventory.available', 'inventory.current_level',
                    'inventory.target_level', 'inventory.below_target_level')
            ->where('inventory.below_target_level', '>', 0)
            ->get();
        return array('active_orders'=>$activeOrders, 'inventoryReorder'=>$InvToReOrder);
    }
    
    static function getUsers(){
        $uers = DB::table('users')
                ->select('id', 'name', 'email','created_at','updated_at')
                ->get();
        return $uers;
    }
}
