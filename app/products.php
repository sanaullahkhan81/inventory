<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class products extends Model
{
    static function getProductsList($discontinued = false, $withoutDiscontinued = false){
        if($discontinued == true){
            $productList = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->select('products.id', 'products.product_code', 'products.product_name', 
                        'categories.category', 'suppliers.company', 'products.attachments',
                        'products.standard_cost', 'products.list_price' )
                ->where('products.discontinue', '=', 1)
                ->get();
        }else if($withoutDiscontinued == true){
            $productList = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->join('inventory', 'inventory.product_id', '=', 'products.id')
                ->select('products.id', 'products.product_code', 'products.product_name', 
                        'categories.category', 'suppliers.company', 'products.attachments',
                        'products.standard_cost', 'products.list_price', 'products.description', 
                        'products.sup_item_code','inventory.available',
                        DB::raw('CONCAT(suppliers.first_name, " ", suppliers.last_name) AS sup_name'))
                ->where('products.discontinue', '=', 0)
                ->get();
        }else{
            $productList = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->join('inventory', 'inventory.product_id', '=', 'products.id')
                ->select('products.id','products.product_code', 'products.product_name', 
                        'categories.category', 'suppliers.company', 'products.attachments',
                        'products.standard_cost', 'products.list_price', 'products.description', 
                        'products.sup_item_code', 'inventory.available')
                ->get();
        }
        return $productList;
    }
    
    static function getProductById($productid){
        $product = DB::table('products')
                ->select('id', 'product_code', 'product_name', 'size', 
                        'category_id', 'supplier_id', 'sup_code', 'sup_item_code', 
                        'standard_cost', 'list_price',  'quantity_per_unit',
                        'discontinue','description', 'attachments')
                ->where('id', '=', $productid)
                ->get();
        return $product;
    }
    
    static function getInventoryLevels($restocking = false){
        if($restocking == true){
            $InventoryLevels = DB::table('inventory')
                ->join('products', 'products.id', '=', 'inventory.product_id')
                ->select('inventory.id', 'inventory.product_id',
                        'products.product_name', 'products.attachments',
                        'inventory.on_hand', 'inventory.allocated',
                        'inventory.available', 'inventory.shrinkage',
                        'inventory.on_order', 'inventory.current_level', 
                        'inventory.target_level', 'inventory.below_target_level')
                ->where('inventory.below_target_level', '>', 0)
                ->get();
        }else{
            $InventoryLevels = DB::table('inventory')
                ->join('products', 'products.id', '=', 'inventory.product_id')
                ->select('inventory.id', 'inventory.product_id', 
                        'products.product_name', 'products.attachments',
                        'inventory.on_hand', 'inventory.allocated',
                        'inventory.available', 'inventory.shrinkage',
                        'inventory.on_order', 'inventory.current_level', 
                        'inventory.target_level', 'inventory.below_target_level')
                ->get();
        }
        return $InventoryLevels;
    }
    
    static function getProductCategories(){
        $categories = DB::table('categories')
                ->select('id', 'category', 'cat_code')
                ->get();
        return $categories;
    }
    
    static function getCategoryById($categoryid){
        $categories = DB::table('categories')
                ->select('id', 'category', 'cat_code')
                ->where('id','=',$categoryid)
                ->get();
        return $categories;
    }
    
    static function addCategory($categoryName, $categoryCode){
        $categoryid = DB::table('categories')
                ->insertGetId([
                    'category'=>$categoryName,
                    'cat_code'=>$categoryCode
                ]);
        return $categoryid;
    }
    
    static function updateCategory($categoryid, $categoryName, $categoryCode){
        $categories = DB::table('categories')
                ->where('id','=',$categoryid)
                ->update([
                    'category'=>$categoryName,
                    'cat_code'=>$categoryCode
                ]);
        return $categories;
    }
    
    static function addProduct($productName, $productCode, $standardCost, $category,
                $listPrice, $supplier, $qtyPerUnit, $description, $filePath, $supCode, $supItemCode, $size){
        $id = DB::table('products')->insertGetId(
            [
//                'product_code' => $productCode, // auto generated
                'product_name' => $productName, 
                'standard_cost'=> $standardCost, 
                'list_price' => $listPrice, 
                'quantity_per_unit' => $qtyPerUnit,
                'description' => $description,
                'supplier_id' => $supplier,
                'category_id' => $category,
                'attachments' => $filePath,
                'sup_code' => $supCode,
                'sup_item_code' => $supItemCode,
                'size' => $size
                ]
        );
        
        DB::table('products')
            ->where('id', $id)
            ->update([
                'product_code' => $productCode.'-'.$id
                    ]);
        
        $iid = DB::table('inventory')->insertGetId(
            ['product_id' => $id]
        );
        return $id;
    }
    
    static function updateProduct($productid, $productName, $productCode, $standardCost, $category,
                $listPrice, $supplier, $qtyPerUnit, $discontinued, $description, $filePath, $supCode, $supItemCode, $size, $invInitialLevel, 
                    $invMinReorderQty, $invReorderLevel, $invTargetLevel, $invShrinkagedates, 
                    $invShrinkagequantities, $invShrinkagereasons){
        DB::table('products')
            ->where('id', $productid)
            ->update([
                'product_code' => $productCode, // auto generated
                'product_name' => $productName, 
                'standard_cost'=> $standardCost, 
                'list_price' => $listPrice, 
                'quantity_per_unit' => $qtyPerUnit,
                'discontinue' => $discontinued,
                'description' => $description,
                'supplier_id' => $supplier,
                'category_id' => $category,
                'attachments' => $filePath,
                'sup_code' => $supCode,
                'sup_item_code' => $supItemCode,
                'size' => $size
                    ]);
        //- check shrinkage and update inventory
        $tSh = DB::table('inventoryshrinkage')
            ->where('product_id', $productid)
                ->select(DB::raw('sum(quantity) as total_shrinkage'))
                ->get();
        $oldSh = 0;
        if(count($tSh)>0)
        {
            $oldSh = !empty($tSh[0]->total_shrinkage)?$tSh[0]->total_shrinkage:0;
        }
        $newSh = array_sum($invShrinkagequantities);
        $diffSh = $oldSh - $newSh;
        
        DB::table('inventoryshrinkage')
            ->where('product_id', $productid)
            ->delete();
        
        foreach ($invShrinkagequantities as $index=>$qty){
            if(!empty($qty)){
                DB::table('inventoryshrinkage')->insert([
                    'date'=>date('Y-m-d', strtotime($invShrinkagedates[$index])),
                    'quantity'=>$qty,
                    'reason'=>$invShrinkagereasons[$index],
                    'product_id'=>$productid
                ]);
            }
        }
        
        //$recOld = self::getInventoryByProductId($productid);
        
        DB::update("UPDATE inventory SET initial_level = $invInitialLevel, "
                . "min_reorder_quantity = $invMinReorderQty, "
                . "reorder_level = $invReorderLevel, "
                . "target_level = $invTargetLevel ,"
                . "shrinkage = $newSh"
                ." where product_id = ?", [$productid]);
        
        DB::update("UPDATE inventory SET on_hand = (initial_level + received - shrinkage - shipped), "
                . "available = (initial_level + received - shrinkage - shipped - allocated), "
                . "current_level = ((initial_level + received - shrinkage - shipped - allocated)+ on_order) "
                . " where product_id = ?", [$productid]);
        
        DB::update("UPDATE inventory SET below_target_level = IF((target_level - on_hand + allocated + shrinkage)<0,0,(target_level - on_hand + allocated + shrinkage))"
                . " where product_id = ?", [$productid]);     
        
        return $productid;
    }
    
    static function productOrderHistory($productid) {
        $prodOH = DB::table('order_details')
                ->join('orders', 'orders.id', '=', 'order_details.order_id')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('order_details.order_id', 'order_details.created_date', 
                        'customers.company', 'order_details.quantity', 'order_details.status' )
                ->where('order_details.product_id', '=', $productid)
                ->get();
        return $prodOH;
    }
    
    static function productPurchaseHistory($productid) {
       $prodPH = DB::table('purchase_order_details')
                ->join('purchase_orders', 'purchase_orders.id', '=', 'purchase_order_details.purchase_order_id')
                ->join('suppliers', 'suppliers.id', '=', 'purchase_orders.supplier_id')
                ->select('purchase_orders.id', 'purchase_order_details.created_date', 
                        'suppliers.company', 'purchase_order_details.quantity', 
                        'purchase_order_details.unit_cost', 'purchase_order_details.date_received' )
                ->where('purchase_order_details.product_id', '=', $productid)
                ->get();
        return $prodPH; 
    }
    
    static function getInventoryByProductId($productid)
    {
        $prodPH = DB::table('inventory')
                ->select('id','product_id', 'reorder_level', 'target_level', 
                        'min_reorder_quantity', 'received', 'on_order', 'shrinkage',
                        'shipped', 'allocated', 'back_ordered', 'initial_level',
                        'on_hand', 'available', 'current_level', 'below_target_level',
                        'reorder_quantity', 'created_date')
                ->where('product_id', '=', $productid)
                ->get();
        return $prodPH; 
    }
    
    static function getInventoryShrinkageByProductId($productid)
    {
        $prodPH = DB::table('inventoryshrinkage')
                ->select('id', 'date', 'quantity', 'reason', 'product_id', 'created_date' )
                ->where('product_id', '=', $productid)
                ->get();
        return $prodPH; 
        
    }
    
    static function getProductsBySupplierId($supplierId, $onlyContinued = false)
    {
        if($onlyContinued == true){
            $productList = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->select('products.id','products.product_code', 'products.product_name', 
                        'categories.category', 'suppliers.company', 'products.sup_item_code',
                        'products.standard_cost', 'products.list_price', 'products.attachments',
                        DB::raw('CONCAT(suppliers.first_name, " ", suppliers.last_name) AS sup_name'))
                ->where('products.supplier_id', '=', $supplierId)
                ->where('products.discontinue', '=', 0)
                ->get();
        }else{
            $productList = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->select('products.id','products.product_code', 'products.product_name', 
                        'categories.category', 'suppliers.company', 'products.sup_item_code',
                        'products.standard_cost', 'products.list_price', 'products.attachments',
                        DB::raw('CONCAT(suppliers.first_name, " ", suppliers.last_name) AS sup_name'))
                ->where('products.supplier_id', '=', $supplierId)
                ->get();
        }
        return $productList;
    }
}
