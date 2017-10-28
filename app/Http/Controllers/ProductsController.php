<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\supplier;
use App\upload;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'products';
        $productslist = products::getProductsList();
        return view('products', compact('page', 'productslist'));
    }
    
    public function inventorylevels(){
        $page = 'inventorylevels';
        $inventoryLevels = products::getInventoryLevels();
        return view('products', compact('page', 'inventoryLevels'));
    }
    
    public function needsrestocking(){
        $page = 'needsrestocking';
        $inventoryLevels = products::getInventoryLevels(true);
        return view('products', compact('page', 'inventoryLevels'));
    }
    
    public function discontinuedproducts(){
        $page = 'discontinued';
        $productslist = products::getProductsList(true);
        return view('products', compact('page', 'productslist'));
    }
    
    public function productcategory(){
        $page = 'productcategory';
        $productCategories = products::getProductCategories();
        return view('products', compact('page', 'productCategories'));
    }
    
    public function suppliers(){
        $page = 'productsuppliers';
        $suppliers = supplier::getSuppliers();
        return view('products', compact('page', 'suppliers'));
    }
    
    public function addproductmodal($productid=0){
        $categories = products::getProductCategories();
        $suppliers = supplier::getSuppliers();
        if($productid == 0)
        {
            $productdetail = null;
            $prodinventory = null;
            $prodinventoryshrinkage = array();
            return view('product.modal.addProductModal', compact('categories', 'suppliers', 'productdetail', 'prodinventory', 'prodinventoryshrinkage'));
        }
        else
        {
            $productdetail = products::getProductById($productid);
            $prodinventory = products::getInventoryByProductId($productid);
            $prodinventory = (count($prodinventory)>0)?$prodinventory:null;
            $prodinventoryshrinkage = products::getInventoryShrinkageByProductId($productid);
            
            return view('product.modal.addProductModal', compact('categories', 'suppliers', 'productdetail', 'prodinventory', 'prodinventoryshrinkage'));
        }
    }
    public function saveproduct($productid=0){
        $imageName = Input::get('imageName');
        $imageChanged = Input::get('hasImage');
        $file = Input::file('imageData');
        $productName = Input::get('productName');
        $productCode = Input::get('productCode');
        $standardCost = Input::get('standardCost');
        $category = Input::get('category');
        $listPrice = Input::get('listPrice');
        $supplier = Input::get('supplier');
        $qtyPerUnit = Input::get('qtyPerUnit');
        $discontinued = Input::get('discontinued');
        $description = Input::get('description');
        $supCode = Input::get('supcode');
        $supItemCode = Input::get('supitemcode');
        $size = Input::get('size');
        
        $invInitialLevel = Input::get('invInitialLevel');
        $invMinReorderQty = Input::get('invMinReorderQty');
        $invReorderLevel = Input::get('invReorderLevel');
        $invTargetLevel = Input::get('invTargetLevel');
        $invShrinkagedates = Input::get('invShrinkagedates');
        $invShrinkagequantities = Input::get('invShrinkagequantities');
        $invShrinkagereasons = Input::get('invShrinkagereasons');
        
        $invShrinkagedates =  explode("^|^", $invShrinkagedates);
        $invShrinkagequantities =  explode("^|^", $invShrinkagequantities);
        $invShrinkagereasons =  explode("^|^", $invShrinkagereasons);
        
//        print_r($invShrinkagedates);
//        exit();
        
        
        $res = 0;
        
        if($imageChanged == 0)
        {
            $filePath = explode( "/" , $imageName )[1];
        }
        else
        {
            $filePath = upload::uploadFile($file);
            
            if(explode( "=" , $filePath )[0] == "true")
            {
                $filePath = explode( "=" , $filePath )[1];
            }
            else
            {
                echo $res;
                exit();
            }
        }
        
        if($productid == 0)
        {
            $res = products::addProduct($productName, $productCode, $standardCost, $category,
                $listPrice, $supplier, $qtyPerUnit, $description, $filePath, $supCode, $supItemCode, $size);
        }
        else {
            $res = products::updateProduct($productid, $productName, $productCode, $standardCost, $category,
                $listPrice, $supplier, $qtyPerUnit, $discontinued, $description, $filePath, $supCode, $supItemCode, $size, $invInitialLevel, 
                    $invMinReorderQty, $invReorderLevel, $invTargetLevel, $invShrinkagedates, 
                    $invShrinkagequantities, $invShrinkagereasons);
        }
        
        echo $res;
//dd($name);        
    }
    
    public function getProdOrderHistory($productid=0)
    {
        $prodOrderHistory = products::productOrderHistory($productid);
        
        return view('product.modal.productOrderHistory', compact('prodOrderHistory'));
        //echo $prodOrderHistory;
    }
    
    public function getProdPuchaseHistory($productid=0)
    {
        $prodPurchaseHistory = products::productPurchaseHistory($productid);
        
        return view('product.modal.productPurchaseHistory', compact('prodPurchaseHistory'));
    }
    
}
