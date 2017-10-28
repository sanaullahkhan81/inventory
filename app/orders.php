<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class orders extends Model
{
    static function getOrdersList($needInvoicing = false, $readyToShip = false, $awaitingPayments = false, $completed = false){
        if($needInvoicing == true){
            $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.employee_id')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('orders.id', 'orders.order_date', 'orders.status',
                        'users.name', 'customers.customer_name', 'customers.company',
                        'orders.order_sub_total', 'orders.order_total', 'orders.shipped_date', 'orders.currency_value',
                        'orders.payment_date', 'orders.shipping_fee', 'orders.tax', 'orders.order_total',
                        DB::raw("IF(orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
                ->where('orders.status_id', '=', 0)
                ->get();
        }else if($readyToShip == true){
            $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.employee_id')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('orders.id', 'orders.order_date', 'orders.status',
                        'users.name', 'customers.customer_name', 'customers.company',
                        'orders.order_sub_total', 'orders.order_total', 'orders.shipped_date', 'orders.currency_value',
                        'orders.payment_date', 'orders.shipping_fee', 'orders.tax', 'orders.order_total',
                        DB::raw("IF(orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
                ->where('orders.status_id', '=', 10)
                ->get();
        }else if($awaitingPayments == true){
            $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.employee_id')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('orders.id', 'orders.order_date', 'orders.status',
                        'users.name', 'customers.customer_name', 'customers.company',
                        'orders.order_sub_total', 'orders.order_total', 'orders.shipped_date', 'orders.currency_value',
                        'orders.payment_date', 'orders.shipping_fee', 'orders.tax', 'orders.order_total',
                        DB::raw("IF(orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
                ->whereIn('orders.status_id', [10, 20])
                ->get();
        }else if($completed == true){
            $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.employee_id')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('orders.id', 'orders.order_date', 'orders.status',
                        'users.name', 'customers.customer_name', 'customers.company',
                        'orders.order_sub_total', 'orders.order_total', 'orders.shipped_date', 'orders.currency_value',
                        'orders.payment_date', 'orders.shipping_fee', 'orders.tax', 'orders.order_total',
                        DB::raw("IF(orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
                ->where('orders.status_id', '=', 30)
                ->get();
        }else{
            $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.employee_id')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('orders.id', 'orders.order_date', 'orders.status',
                        'users.name', 'customers.customer_name', 'customers.company',
                        'orders.order_sub_total', 'orders.order_total', 'orders.shipped_date', 'orders.currency_value',
                        'orders.payment_date', 'orders.shipping_fee', 'orders.tax', 'orders.order_total',
                        DB::raw("IF(orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
                ->get();
        }
        return $orders;
    }
    
    static function getShippers(){
        $shippers = DB::table('shippers')
                ->select('id', 'company', 'first_name','last_name','email_address',
                  'job_title','business_phone','home_phone','mobile_phone','fax_number',
                  'address','city','state','zip','country','web_page','notes', 'attachments')
                ->get();
        return $shippers;
    }
    
    static function getInvoiceByOrder($orderId, $orderType){
        $invoice = DB::table('invoices')
                ->select('id', 'invoice_date', 'due_date', 'tax', 'shipping', 'order_id', 
                        'sub_total', 'amount_due','order_type','created_date')
                ->where('order_id', '=', $orderId)
                ->where('order_type', '=', $orderType)
                ->get();
        return $invoice;	 	 	 	 	 	 	 	 	
    }
    
    static function getOrderById($orderId)
    {
        $order = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.employee_id')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('orders.id', 'orders.order_date', 'orders.employee_id', 'users.name', 
                    'orders.shipped_date', 'orders.ship_address', 'orders.ship_city', 'orders.ship_state', 
                    'orders.ship_zip', 'orders.ship_country', 'orders.shipping_fee', 'orders.tax', 
                    'orders.payment_type', 'orders.payment_date', 'orders.notes', 'orders.tax_rate', 
                    'orders.order_month', 'orders.order_year', 'orders.order_sub_total', 'orders.order_total', 
                    'orders.closed_date', 'orders.order_qtr', 'orders.ship_name', 'orders.status', 
                    'orders.status_id', 'orders.new', 'orders.ship_via', 'orders.completed','orders.shipped', 
                    'orders.invoiced', 'orders.active', 'orders.customer_id', 'customers.customer_name', 
                    'customers.company', 'orders.created_date', 'orders.currency_type', 'orders.currency_value',
                    DB::raw("IF(orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
            ->where('orders.id', '=', $orderId)
            ->get();
        
        return $order;
    }
    
    static function getOrderDetailByOrderId($orderId)
    {
        $order = DB::table('order_details')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->join('inventory', 'inventory.product_id', '=', 'order_details.product_id')
            ->select('order_details.id', 'order_details.order_id', 'order_details.product_id', 
                    'products.product_name', 'products.attachments', 
                    'order_details.quantity', 'inventory.available', 'order_details.unit_price', 'order_details.discount', 
                    'order_details.extended_price', 'order_details.status_id', 'order_details.status', 
                    'order_details.no_stock', 'order_details.allocated', 'order_details.invoiced', 
                    'order_details.shipped', 'order_details.back_ordered', 'order_details.created_date')
            ->where('order_id', '=', $orderId)
            ->get();
        
        return $order;
    }
    
    static function getOrderStatusById($osId)
    {
        $os = DB::table('order_status')
            ->select('id', 'status_id', 'status_text', 'created_date')
            ->where('status_id', '=', $osId)
            ->get();
        
        return $os;
    }
    
    static function getOrderDetailStatusById($odsId)
    {
        $ods = DB::table('order_details_status')
            ->select('id', 'status_id', 'status_text', 'created_date')
            ->where('status_id', '=', $odsId)
            ->get();
        
        return $ods;
    }
    
    static function checkSelectedPoroductsQualtitAvailable($arrProductIds, $arrQuantities){
        $products = DB::table('inventory')
                ->select('inventory.product_id','inventory.available', 'products.product_name')
                ->join('products', 'products.id', '=', 'inventory.product_id')
                ->whereIn('product_id', $arrProductIds)
                ->get();
        $arrayPro = array();
        foreach($products as $product){
            $arrayPro[$product->product_id] = array('name'=>$product->product_name, 'qty'=>$product->available);
        }
        
        $message = '';
        
        foreach($arrProductIds as $index => $idpro){
            if($arrayPro[$idpro]['qty'] < $arrQuantities[$index]){
                $message.= ($arrayPro[$idpro]['name'].' product available quantity is '.$arrayPro[$idpro]['qty']."\n");
            }
        }
        
        if($message == ''){
            return true;
        }else{
            $message .= 'Please change quantity of listed products.';
            return $message;
        }
    }
    
    static function saveOrder($orderId, $orderStatus, $reqStatusId, $customerId, $userId, $arrProductIds, $arrQuantities, 
            $arrUnitPrices, $arrDiscounts, $arrTotalPrices, $arrStatuses, $shipViaId, $shipDate, $shipFee, 
            $shipName, $shipAddress, $shipCity, $shipState, $shipZip, $shipCountry, $orderDate, $paymentTypeId, 
            $paymentDate, $taxRate, $notes, $subTotal, $tax, $orderTotal, $currencyType, $currencyValue)
    {
        $oNew = 1;
        $oInvoiced = ($reqStatusId == 10)? 1 : 0;
        $oShipped = 0;
        $oCompleted = 0;
        
        if($orderId == '(New)')
        {
            $oid = DB::table('orders')->insertGetId(
                ['order_date' => date('Y-m-d H:i:s', strtotime($orderDate)),  
                    'employee_id' => $userId,   
                    'shipped_date' => date('Y-m-d H:i:s', strtotime($shipDate)),  
                    'ship_address' => $shipAddress,  
                    'ship_city' => $shipCity,  
                    'ship_state' => $shipState,  
                    'ship_zip' => $shipZip,  
                    'ship_country' => $shipCountry,  
                    'shipping_fee' => $shipFee,  
                    'tax' => ($tax/$currencyValue),  
                    'payment_type' => $paymentTypeId,  
                    'payment_date' => date('Y-m-d H:i:s', strtotime($paymentDate)),  
                    'notes' => $notes,  
                    'tax_rate' => $taxRate,  
                    'order_month' => date('m', strtotime($orderDate)), 
                    'order_year' => date('Y', strtotime($orderDate)),
                    'order_sub_total' => ($subTotal/$currencyValue),  
                    'order_total' => ($orderTotal/$currencyValue),  
                    'closed_date' => null,  
                    'order_qtr' => null,  // need to change
                    'ship_name' => $shipName,  
                    'status' => (self::getOrderStatusById($reqStatusId)[0]->status_text),  
                    'status_id' => $reqStatusId,
                    'new' => $oNew,  
                    'ship_via' => $shipViaId,  
                    'completed' => $oCompleted, 
                    'shipped' => $oShipped,  
                    'invoiced' => $oInvoiced,  
                    'active' => 1,  
                    'customer_id' => $customerId,
                    'currency_type' => $currencyType,
                    'currency_value' => $currencyValue
                    ]
            );
            
            if($reqStatusId == 10)
            {
                DB::table('invoices')->insert([
                    'invoice_date' => date('Y-m-d H:i:s'),
                    'due_date' => date('Y-m-d H:i:s'),
                    'tax' => ($tax/$currencyValue),
                    'shipping' => $shipFee,
                    'order_id' => $oid,
                    'sub_total' => ($subTotal/$currencyValue),
                    'amount_due' => ($orderTotal/$currencyValue),
                    'created_date' => date('Y-m-d H:i:s')
                ]);	 	 	
            }
            
            foreach ($arrProductIds as $index=>$pid){
                if(!empty($pid)){
                    
                    $arrStatuses[$index] = ($reqStatusId==10)?40:$arrStatuses[$index];
                    $arrStatuses[$index] = ($reqStatusId==20)?50:$arrStatuses[$index];
                    
                    DB::table('order_details')->insert([
                        'order_id' => $oid,
                        'product_id' => $pid,
                        'quantity' => $arrQuantities[$index],
                        'unit_price' => ($arrUnitPrices[$index]/$currencyValue),
                        'discount' => $arrDiscounts[$index],
                        'extended_price' => ($arrTotalPrices[$index]/$currencyValue),
                        'status_id' => $arrStatuses[$index],
                        'status' => (self::getOrderDetailStatusById($arrStatuses[$index])[0]->status_text),
                        'no_stock' => ($arrStatuses[$index] == 10)? 1 : 0,
                        'allocated' => ($arrStatuses[$index] == 30)? 1 : 0,
                        'invoiced' => ($arrStatuses[$index] == 40)? 1 : 0,
                        'shipped' => ($arrStatuses[$index] == 50)? 1 : 0,
                        'back_ordered' => (($arrStatuses[$index] == 20)? 1 : 0)
                    ]);
                    
                    if($reqStatusId == 10)
                    {
                        self::updateInventoryOnInvoiced($pid, $arrQuantities[$index]);
                    }
                }
            }
        }
        else 
        {
            $oid = $orderId;
            if($reqStatusId == 0)
            {
                $oNew = 1;
                $oInvoiced = 0;
                $oShipped = 0;
                $oCompleted = 0;
            }
            else if($reqStatusId == 10)
            {
                $oNew = 1;
                $oInvoiced = 1;
                $oShipped = 0;
                $oCompleted = 0;
            }
            else if($reqStatusId == 20)
            {
                $oNew = 1;
                $oInvoiced = 1;
                $oShipped = 1;
                $oCompleted = 0;
            }
            else if($reqStatusId == 30)
            {
                $oNew = 1;
                $oInvoiced = 1;
                $oShipped = 1;
                $oCompleted = 1;
            }
            
            DB::table('orders')
            ->where('id', $orderId)
            ->update(['order_date' => date('Y-m-d H:i:s', strtotime($orderDate)),  
                    'employee_id' => $userId,   
                    'shipped_date' => date('Y-m-d H:i:s', strtotime($shipDate)),  
                    'ship_address' => $shipAddress,  
                    'ship_city' => $shipCity,  
                    'ship_state' => $shipState,  
                    'ship_zip' => $shipZip,  
                    'ship_country' => $shipCountry,  
                    'shipping_fee' => $shipFee,  
                    'tax' => ($tax/$currencyValue),  
                    'payment_type' => $paymentTypeId,  
                    'payment_date' => date('Y-m-d H:i:s', strtotime($paymentDate)),  
                    'notes' => $notes,  
                    'tax_rate' => $taxRate,  
                    'order_month' => date('m', strtotime($orderDate)), 
                    'order_year' => date('Y', strtotime($orderDate)),
                    'order_sub_total' => ($subTotal/$currencyValue),  
                    'order_total' => ($orderTotal/$currencyValue),  
                    'closed_date' => null,  
                    'order_qtr' => null,  // need to change
                    'ship_name' => $shipName,  
                    'status' => (self::getOrderStatusById($reqStatusId)[0]->status_text),  
                    'status_id' => $reqStatusId,
                    'new' => $oNew,  
                    'ship_via' => $shipViaId,  
                    'completed' => $oCompleted, 
                    'shipped' => $oShipped,  
                    'invoiced' => $oInvoiced,  
                    'active' => 1,  
                    'customer_id' => $customerId,
                    'currency_type' => $currencyType,
                    'currency_value' => $currencyValue
                    ]);
            
            if($reqStatusId == 10)
            {
                $invoice = self::getInvoiceByOrder($oid, 'CO');
                if(count($invoice) == 0)
                {
                   DB::table('invoices')->insert([
                        'invoice_date' => date('Y-m-d H:i:s'),
                        'due_date' => date('Y-m-d H:i:s'),
                        'tax' => ($tax/$currencyValue),
                        'shipping' => $shipFee,
                        'order_id' => $oid,
                        'sub_total' => ($subTotal/$currencyValue),
                        'amount_due' => ($orderTotal/$currencyValue),
                        'created_date' => date('Y-m-d H:i:s')
                    ]); 
                }
            }
            
            DB::table('order_details')
                ->where('order_id', $orderId)
                ->delete();
            
            foreach ($arrProductIds as $index=>$pid){
                if(!empty($pid)){
                    
                    $arrStatuses[$index] = ($reqStatusId==10)?40:$arrStatuses[$index];
                    $arrStatuses[$index] = ($reqStatusId==20)?50:$arrStatuses[$index];
                    
                    DB::table('order_details')->insert([
                        'order_id' => $orderId,
                        'product_id' => $pid,
                        'quantity' => $arrQuantities[$index],
                        'unit_price' => ($arrUnitPrices[$index]/$currencyValue),
                        'discount' => $arrDiscounts[$index],
                        'extended_price' => ($arrTotalPrices[$index]/$currencyValue),
                        'status_id' => $arrStatuses[$index],
                        'status' => (self::getOrderDetailStatusById($arrStatuses[$index])[0]->status_text),
                        'no_stock' => ($arrStatuses[$index] == 10)? 1 : 0,
                        'allocated' => ($arrStatuses[$index] == 30)? 1 : 0,
                        'invoiced' => (($arrStatuses[$index] == 40)? 1 : 0),
                        'shipped' => ($arrStatuses[$index] == 50)? 1 : 0,
                        'back_ordered' => (($arrStatuses[$index] == 20)? 1 : 0)
                    ]);
                    
                    if($reqStatusId == 10 && $orderStatus != 'Invoiced')
                    {
                        self::updateInventoryOnInvoiced($pid, $arrQuantities[$index]);
                    }
                    else if($reqStatusId == 20 && $orderStatus != 'Shipped')
                    {
                        self::updateInventoryOnShipped($pid, $arrQuantities[$index]);
                    }
                }
            }
        }
        return $oid;
    }
    
    static function updateInventoryOnInvoiced($productId, $quantity)
    {   
        DB::update("UPDATE inventory SET allocated = (allocated + $quantity), "
                . "available = (available - $quantity), "
                . "current_level = (current_level - $quantity) "
                . " where product_id = ?", [$productId]);
        
        self::updateBelowTargetLevel($productId);
    }
    
    static function updateInventoryOnShipped($productId, $quantity)
    {
        DB::update("UPDATE inventory SET allocated = (allocated - $quantity), "
                . "on_hand = (on_hand - $quantity), "
                . "shipped = (shipped + $quantity)"
                . " where product_id = ?", [$productId]);
        
        self::updateBelowTargetLevel($productId);
    }
    
    static function updateBelowTargetLevel($productid)
    {
        DB::update("UPDATE inventory SET below_target_level = IF((target_level - on_hand + allocated + shrinkage)<0,0,(target_level - on_hand + allocated))"
                . " where product_id = ?", [$productid]);
    }
    
    static function cancelOrder($orderId)
    {
        // remove quantity from Inventory
        $odts = DB::table('order_details')
                ->select('id', 'order_id', 'product_id', 'quantity', 'unit_price', 'discount', 
                        'extended_price', 'status_id', 'status', 'no_stock', 'allocated', 'invoiced', 
                        'shipped', 'back_ordered', 'created_date')
                ->where('order_id', '=', $orderId)
                ->get();
        
        foreach ($odts as $od)
        {
            self::updateInventoryOnCancelOrder($od->product_id, $od->quantity);
        }
        
        // remove from Invoices
        DB::table('invoices')
            ->where('order_id', '=', $orderId)
            ->where('order_type', '=', 'CO')
            ->delete();
        
        // remove from Details
        DB::table('order_details')
            ->where('order_id', '=', $orderId)
            ->delete();
        
        // remove Order
        DB::table('orders')
            ->where('id', '=', $orderId)
            ->delete();
        
        echo 'done';
    }
    
    static function updateInventoryOnCancelOrder($productId, $quantity)
    {   
        DB::update("UPDATE inventory SET allocated = (allocated - $quantity), "
                . "available = (available + $quantity), "
                . "current_level = (current_level + $quantity) "
                . " where product_id = ?", [$productId]);
        
        self::updateBelowTargetLevel($productId);
    }
    // ============================================================
    // ========== ========== Purchase Order  ==========  ==========
    // ============================================================
    
    static function getPurchaseOrders($pCateId=1)
    {
        $orders;
        if($pCateId == 1)
        {
            $orders = DB::table('purchase_orders')
            ->leftjoin('users as createduser', 'createduser.id', '=', 'purchase_orders.created_by')
            ->leftjoin('users as submitteduser', 'submitteduser.id', '=', 'purchase_orders.submitted_by')
            ->join('suppliers', 'suppliers.id', '=', 'purchase_orders.supplier_id')
            ->select('purchase_orders.id', 'createduser.name as createdusername', 
                    'purchase_orders.creation_date', 'purchase_orders.status', 
                    'suppliers.company', 'submitteduser.name as submittedusername', 
                    'purchase_orders.payment_date', 'purchase_orders.order_total', 'purchase_orders.currency_value',
                    DB::raw("IF(purchase_orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign")
                    )
            ->get();
        }
        else if($pCateId == 2)
        {
            $orders = DB::table('purchase_orders')
            ->leftjoin('users as createduser', 'createduser.id', '=', 'purchase_orders.created_by')
            ->leftjoin('users as submitteduser', 'submitteduser.id', '=', 'purchase_orders.submitted_by')
            ->join('suppliers', 'suppliers.id', '=', 'purchase_orders.supplier_id')
            ->select('purchase_orders.id', 'createduser.name as createdusername', 
                    'purchase_orders.creation_date', 'purchase_orders.status', 
                    'suppliers.company', 'submitteduser.name as submittedusername', 
                    'purchase_orders.payment_date', 'purchase_orders.order_total', 'purchase_orders.currency_value',
                    DB::raw("IF(purchase_orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign")
                    )
            ->where('purchase_orders.new', '=', 1)
            ->where('purchase_orders.submitted', '=', 0)
            ->where('purchase_orders.completed', '=', 0)
            ->get();
        }
        else if($pCateId == 3)
        {
            $orders = DB::table('purchase_orders')
            ->leftjoin('users as createduser', 'createduser.id', '=', 'purchase_orders.created_by')
            ->leftjoin('users as submitteduser', 'submitteduser.id', '=', 'purchase_orders.submitted_by')
            ->join('suppliers', 'suppliers.id', '=', 'purchase_orders.supplier_id')
            ->select('purchase_orders.id', 'createduser.name as createdusername', 
                    'purchase_orders.creation_date', 'purchase_orders.status', 
                    'suppliers.company', 'submitteduser.name as submittedusername', 
                    'purchase_orders.payment_date', 'purchase_orders.order_total', 'purchase_orders.currency_value',
                    DB::raw("IF(purchase_orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign")
                    )
            ->where('purchase_orders.new', '=', 0)
            ->where('purchase_orders.submitted', '=', 1)
            ->where('purchase_orders.completed', '=', 0)
            ->get();
        }
        else if($pCateId == 4)
        {
            $orders = DB::table('purchase_orders')
            ->leftjoin('users as createduser', 'createduser.id', '=', 'purchase_orders.created_by')
            ->leftjoin('users as submitteduser', 'submitteduser.id', '=', 'purchase_orders.submitted_by')
            ->join('suppliers', 'suppliers.id', '=', 'purchase_orders.supplier_id')
            ->select('purchase_orders.id', 'createduser.name as createdusername', 
                    'purchase_orders.creation_date', 'purchase_orders.status', 
                    'suppliers.company', 'submitteduser.name as submittedusername', 
                    'purchase_orders.payment_date', 'purchase_orders.order_total', 'purchase_orders.currency_value',
                    DB::raw("IF(purchase_orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign")
                    )
            ->where('purchase_orders.new', '=', 0)
            ->where('purchase_orders.submitted', '=', 1)
            ->where('purchase_orders.completed', '=', 1)
            ->get();
        }
        
        return $orders;
    }
    
    static function getPurchaseOrderById($poId)
    {
        $order = DB::table('purchase_orders')
            ->leftjoin('users as createduser', 'createduser.id', '=', 'purchase_orders.created_by')
            ->leftjoin('users as submitteduser', 'submitteduser.id', '=', 'purchase_orders.submitted_by')
            ->leftjoin('users as completeduser', 'completeduser.id', '=', 'purchase_orders.closed_by')
            ->join('suppliers', 'suppliers.id', '=', 'purchase_orders.supplier_id')
            ->select('purchase_orders.id', 'purchase_orders.order_date', 'purchase_orders.supplier_id', 
                    'suppliers.supplier_name', 'suppliers.company', 'purchase_orders.created_by', 'createduser.name as createdusername', 
                    'purchase_orders.creation_date', 'purchase_orders.expected_date', 
                    'purchase_orders.shipping_fee', 'purchase_orders.taxes', 'purchase_orders.payment_date', 
                    'purchase_orders.payment_amount', 'purchase_orders.payment_method', 'purchase_orders.notes', 
                    'purchase_orders.order_sub_total', 'purchase_orders.order_total', 
                    'purchase_orders.submitted_by', 'submitteduser.name as submittedusername', 'purchase_orders.submitted_date', 
                    'purchase_orders.closed_by', 'completeduser.name as completedusername', 'purchase_orders.closed_date', 
                    'purchase_orders.completed', 'purchase_orders.submitted', 
                    'purchase_orders.currency_type', 'purchase_orders.currency_value',
                    'purchase_orders.new', 'purchase_orders.status', 'purchase_orders.created_date',
                    DB::raw("IF(purchase_orders.currency_type = 1, 'SAR. ', 'YER. ') as currency_sign"))
            ->where('purchase_orders.id', '=', $poId)
            ->get();
        
        return $order;
    }
    
    static function getPurchaseOrderDetailByPOId($poId)
    {
        $order = DB::table('purchase_order_details as pod')
            ->join('products', 'products.id', '=', 'pod.product_id')
            ->select('pod.id', 'pod.quantity', 'pod.unit_cost', 'pod.extended_price', 'pod.date_received', 
                    'pod.purchase_order_id', 'products.attachments', 'products.product_name',
                    'pod.product_id', 'pod.posted_to_inventory', 'pod.submitted', 'pod.created_date')
            ->where('purchase_order_id', '=', $poId)
            ->get();
        
        return $order;
    }
    
    static function changeDateFormat($date)
    {
        $fDate = date('Y-m-d', strtotime($date));
        return $fDate;
    }
    
    static function savePurchaseOrder($orderId, $orderStatus, $reqStatusId, $supplierId, $expectedDate, $createdBy, 
                $createDate, $submittedBy, $submittedDate, $closedBy, $closedDate, $arrProductIds, 
                $arrQuantities, $arrUnitPrices, $arrTotalPrices, $arrInvProductIds, $arrInvQuantities, 
                $arrInvReceivedDates, $arrInvPostToInvs, $paymentTypeId, $paymentDate, $notes, 
            $subTotalPurchase, $currencyType, $currencyValue)
    {
        $oNew = 1;
        $oSubmitted = ($reqStatusId == 10)? 1 : 0;
        $oCompleted = 0;
        $oStatus = ($reqStatusId == 10)? 'Submitted' : 'New';
        
        if($orderId == '(New)')
        {
            $poid = DB::table('purchase_orders')->insertGetId(
                ['order_date' => (self::changeDateFormat($createDate)),  
                    'supplier_id' => $supplierId,   
                    'created_by' => $createdBy,  
                    'creation_date' => (self::changeDateFormat($createDate)),  
                    'expected_date' => (self::changeDateFormat($expectedDate)),
                    'shipping_fee' => 0, // need to change
                    'taxes' => 0, // need to change
                    'payment_date' => empty($paymentDate)?null:(self::changeDateFormat($paymentDate)),
                    'payment_amount' => ($subTotalPurchase/$currencyValue), // need to change
                    'payment_method' => $paymentTypeId,
                    'notes' => empty($notes)?null:$notes,
                    'order_sub_total' => ($subTotalPurchase/$currencyValue),
                    'order_total' => ($subTotalPurchase/$currencyValue), // need to change
                    'submitted_by' => empty($submittedBy)?null:$submittedBy,
                    'submitted_date' => empty($submittedDate)?null:(self::changeDateFormat($submittedDate)),
                    'closed_by' => empty($closedBy)?null:$closedBy,
                    'closed_date' => empty($closedDate)?null:(self::changeDateFormat($closedDate)),
                    'completed' => $oCompleted,
                    'submitted' => $oSubmitted,
                    'new' => $oNew,
                    'status' => $oStatus,
                    'currency_type' => $currencyType,
                    'currency_value' => $currencyValue
                    ]
            );
            
            if($reqStatusId == 10)
            {
                DB::table('invoices')->insert([
                    'invoice_date' => date('Y-m-d H:i:s'),
                    'due_date' => date('Y-m-d H:i:s'),
                    'tax' => null,
                    'shipping' => null,
                    'order_id' => $poid,
                    'sub_total' => $subTotalPurchase,
                    'amount_due' => $subTotalPurchase,
                    'order_type' => 'PO',
                    'created_date' => date('Y-m-d H:i:s')
                ]);	 	 	
            }
            
            //  	 	 	 	 	 	 	 
            foreach ($arrProductIds as $index=>$pid){
                if(!empty($pid)){
                    
                    DB::table('purchase_order_details')->insert([
                        'purchase_order_id' => $poid,
                        'product_id' => $pid,
                        'quantity' => $arrQuantities[$index],
                        'unit_cost' => ($arrUnitPrices[$index]/$currencyValue),
                        'extended_price' => ($arrTotalPrices[$index]/$currencyValue),
                        'date_received' => null, 
                        'posted_to_inventory' => 0, 
                        'submitted' => $oSubmitted 
                    ]);
                }
                if($reqStatusId == 10)
                {
                    self::updateInventoryOnSubmitted($pid, $arrQuantities[$index], 0);
                }
                else if($reqStatusId == 20)
                {
                    self::updateInventoryOnCompleted($pid, $arrQuantities[$index], 0);
                }
            }
            
        }
        else 
        {
            $poid = $orderId;
            
            if($reqStatusId == 0)
            {
                $oNew = 1;
                $oSubmitted = 0;
                $oCompleted = 0;
                $oStatus = 'New';
            }
            else if($reqStatusId == 10)
            {
                $oNew = 0;
                $oSubmitted = 1;
                $oCompleted = 0;
                $oStatus = 'Submitted';
            }
            else if($reqStatusId == 20)
            {
                $oNew = 0;
                $oSubmitted = 1;
                $oCompleted = 1;
                $oStatus = 'Completed';
            }
            
            DB::table('purchase_orders')
            ->where('id', $orderId)
            ->update(['order_date' => (self::changeDateFormat($createDate)),  
                    'supplier_id' => $supplierId,   
                    'created_by' => $createdBy,  
                    'creation_date' => (self::changeDateFormat($createDate)),  
                    'expected_date' => (self::changeDateFormat($expectedDate)),
                    'shipping_fee' => 0, // need to change
                    'taxes' => 0, // need to change
                    'payment_date' => empty($paymentDate)?null:(self::changeDateFormat($paymentDate)),
                    'payment_amount' => ($subTotalPurchase/$currencyValue), // need to change
                    'payment_method' => $paymentTypeId,
                    'notes' => empty($notes)?null:$notes,
                    'order_sub_total' => ($subTotalPurchase/$currencyValue),
                    'order_total' => ($subTotalPurchase/$currencyValue), // need to change
                    'submitted_by' => empty($submittedBy)?null:$submittedBy,
                    'submitted_date' => empty($submittedDate)?null:(self::changeDateFormat($submittedDate)),
                    'closed_by' => empty($closedBy)?null:$closedBy,
                    'closed_date' => empty($closedDate)?null:(self::changeDateFormat($closedDate)),
                    'completed' => $oCompleted,
                    'submitted' => $oSubmitted,
                    'new' => $oNew,
                    'status' => $oStatus,
                    'currency_type' => $currencyType,
                    'currency_value' => $currencyValue
                    ]
            );
            
            if($reqStatusId == 10)
            {
                $invoice = self::getInvoiceByOrder($orderId, 'PO');
                if(count($invoice) == 0)
                {
                   DB::table('invoices')->insert([
                        'invoice_date' => date('Y-m-d H:i:s'),
                        'due_date' => date('Y-m-d H:i:s'),
                        'tax' => null,
                        'shipping' => null,
                        'order_id' => $orderId,
                        'sub_total' => $subTotalPurchase,
                        'amount_due' => $subTotalPurchase,
                        'order_type' => 'PO',
                        'created_date' => date('Y-m-d H:i:s')
                    ]); 
                }
            }
            
            $podst = DB::table('purchase_order_details')
                ->select('id', 'quantity', 'unit_cost', 'extended_price', 'date_received', 
                        'product_id', 'posted_to_inventory', 'submitted', 'created_date')
                ->where('purchase_order_id', '=', $poid)
                ->get();
            
            $pods = [];
            foreach ($podst as $pod)
            {
                $pods[$pod->product_id] = $pod;
            }
                
            DB::table('purchase_order_details')
                ->where('purchase_order_id', $orderId)
                ->delete();
            
            if($reqStatusId == 20)
            {
                foreach ($arrProductIds as $index=>$pid){
                    if(!empty($pid)){

                        DB::table('purchase_order_details')->insert([
                            'purchase_order_id' => $poid,
                            'product_id' => $pid,
                            'quantity' => $arrQuantities[$index],
                            'unit_cost' => ($arrUnitPrices[$index]/$currencyValue),
                            'extended_price' => ($arrTotalPrices[$index]/$currencyValue),
                            'date_received' => (self::changeDateFormat($arrInvReceivedDates[$index])),
                            'posted_to_inventory' => $arrInvPostToInvs[$index],
                            'submitted' => $oSubmitted 
                        ]);
                        
                        $oldQty = (isset($pods[$pid]) && $pods[$pid]->posted_to_inventory == 1)? ($pods[$pid]->quantity): 0;
                        self::updateInventoryOnCompleted($pid, $arrQuantities[$index], $oldQty);
                    }
                }
            }
            else 
            {
                $isInvRec = (count($arrInvProductIds) == count($arrProductIds) )? true : false;
               foreach ($arrProductIds as $index=>$pid){
                    if(!empty($pid)){

                        DB::table('purchase_order_details')->insert([
                            'purchase_order_id' => $poid,
                            'product_id' => $pid,
                            'quantity' => $arrQuantities[$index],
                            'unit_cost' => ($arrUnitPrices[$index]/$currencyValue),
                            'extended_price' => ($arrTotalPrices[$index]/$currencyValue),
                            'date_received' => (($isInvRec==false)?(null):( ($arrInvReceivedDates[$index]==null)?(null):(self::changeDateFormat($arrInvReceivedDates[$index])) )),
                            'posted_to_inventory' => (($isInvRec==false)?(0):( $arrInvPostToInvs[$index] )),
                            'submitted' => $oSubmitted
                        ]);
                        //echo '<pre>'; print_r($arrInvPostToInvs);
                        if($reqStatusId == 10)
                        {
                            if($isInvRec == true && $arrInvPostToInvs[$index] == 1)
                            {
                                $oldQty = (isset($pods[$pid]) && $pods[$pid]->posted_to_inventory == 1)? ($pods[$pid]->quantity): 0;
                                self::updateInventoryOnCompleted($pid, $arrQuantities[$index], $oldQty);
                            }
                            else 
                            {
                                $oldQty = (isset($pods[$pid]) && $pods[$pid]->submitted == 1)? ($pods[$pid]->quantity): 0;
                                //echo $arrQuantities[$index].'-'.$oldQty;
                                self::updateInventoryOnSubmitted($pid, $arrQuantities[$index], $oldQty);
                            }
                        }
                    }
                } 
            }
        }
        
        return $poid;
    }
    
    static function updateInventoryOnSubmitted($productId, $quantity, $oldQty)
    {
        DB::update("UPDATE inventory SET on_order = (on_order + $quantity - $oldQty), "
                . "current_level = (current_level + $quantity - $oldQty) "
                . " where product_id = ?", [$productId]);
        
        self::updateBelowTargetLevel($productId);
    }
    
    static function updateInventoryOnCompleted($productId, $quantity, $oldQty)
    {   
        DB::update("UPDATE inventory SET received = (received + $quantity - $oldQty), "
                . "on_order = (on_order - $quantity + $oldQty), "
                . "on_hand = (on_hand + $quantity - $oldQty), "
                . "available = (available + $quantity - $oldQty) "
                . " where product_id = ?", [$productId]);
        
        self::updateBelowTargetLevel($productId);
    }
    
    static function cancelPurchaseOrder($orderId)
    {
        // remove quantity from Inventory
        $podst = DB::table('purchase_order_details')
                ->select('id', 'quantity', 'unit_cost', 'extended_price', 'date_received', 
                        'product_id', 'posted_to_inventory', 'submitted', 'created_date')
                ->where('purchase_order_id', '=', $orderId)
                ->get();
        
        foreach ($podst as $pod)
        {
            self::updateInventoryOnCancelPurchaseOrder($pod->product_id, $pod->quantity);
        }
        
        // remove from Invoices
        DB::table('invoices')
            ->where('order_id', '=', $orderId)
            ->where('order_type', '=', 'PO')
            ->delete();
        
        // remove from Details
        DB::table('purchase_order_details')
                ->where('purchase_order_id', $orderId)
                ->delete();
        
        // remove Order
        DB::table('purchase_orders')
            ->where('id', '=', $orderId)
            ->delete();
        
        echo 'done';
    }
    
    static function updateInventoryOnCancelPurchaseOrder($productId, $quantity)
    {
        DB::update("UPDATE inventory SET on_order = (on_order - $quantity), "
                . "current_level = (current_level - $quantity) "
                . " where product_id = ?", [$productId]);
        
        self::updateBelowTargetLevel($productId);
    }
    
}
