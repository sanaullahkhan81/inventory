<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\supplier;
use App\shipper;
use App\products;
use App\orders;
use App\upload;
use Illuminate\Support\Facades\Input;

class AdvancedController extends Controller
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
    
    public function customers(){
        $page = 'customers';
        $customers = customer::getCustomers();
        return view('advanced', compact('page', 'customers'));
    }
    
    public function employees(){
        
    }
    
    public function suppliers(){
        $page = 'suppliers';
        $suppliers = supplier::getSuppliers();
        return view('advanced', compact('page', 'suppliers'));
    }
    
    public function categories(){
        $page = 'categories';
        $productCategories = products::getProductCategories();
        return view('advanced', compact('page', 'productCategories'));
    }
    
    public function shippers(){
        $page = 'shippers';
        $shippers = shipper::getShippers();
        return view('advanced', compact('page', 'shippers'));
    }
    
    public function addcustomermodal($customerid = 0) {
        $customerdetail = null;
        
        if($customerid != 0) {
            $customerdetail = customer::getCustomerById($customerid);
        }
        return view('modals.CustomerDetailModal', compact('customerdetail'));
    }
    
    public function savecustomer($customerid=0){
        $imageName = Input::get('imageName');
        $imageChanged = Input::get('hasImage');
        $file = Input::file('imageData');
        $firstName = Input::get('firstName');
        $lastName = Input::get('lastName');
        $jobTitle = Input::get('jobTitle');
        $company = Input::get('company');
        $email = Input::get('email');
        $webPage = Input::get('webPage');
        $bPhone = Input::get('bPhone');
        $fax = Input::get('fax');
        $hPhone = Input::get('hPhone');
        $mPhone = Input::get('mPhone');
        $address = Input::get('address');
        $city = Input::get('city');
        $state = Input::get('state');
        $zip = Input::get('zip');
        $country = Input::get('country');
        $notes = Input::get('notes');
        
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
        
        if($customerid == 0)
        {
            $res = customer::addCustomer($firstName, $lastName, $jobTitle, $company,
                $email, $webPage, $bPhone, $fax, $hPhone, $mPhone, $address, $city,
                $state, $zip, $country, $notes, $filePath);
        }
        else {
            $res = customer::updateCustomer($customerid, $firstName, $lastName, $jobTitle, $company,
                $email, $webPage, $bPhone, $fax, $hPhone, $mPhone, $address, $city,
                $state, $zip, $country, $notes, $filePath);
        }
            
        echo $res;       
    }
    
    public function addsuppliermodal($supplierid = 0) {
        $supplierdetail = null;
        
        if($supplierid != 0) {
            $supplierdetail = supplier::getSupplierById($supplierid);
        }
        return view('modals.SupplierDetailModal', compact('supplierdetail'));
    }
    
    public function savesupplier($supplierid=0){
        $imageName = Input::get('imageName');
        $imageChanged = Input::get('hasImage');
        $file = Input::file('imageData');
        $firstName = Input::get('firstName');
        $lastName = Input::get('lastName');
        $supCode = Input::get('supCode');
        $jobTitle = Input::get('jobTitle');
        $company = Input::get('company');
        $email = Input::get('email');
        $webPage = Input::get('webPage');
        $bPhone = Input::get('bPhone');
        $fax = Input::get('fax');
        $hPhone = Input::get('hPhone');
        $mPhone = Input::get('mPhone');
        $address = Input::get('address');
        $city = Input::get('city');
        $state = Input::get('state');
        $zip = Input::get('zip');
        $country = Input::get('country');
        $notes = Input::get('notes');
        
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
        
        if($supplierid == 0)
        {
            $res = supplier::addSupplier($firstName, $lastName, $jobTitle, $company,
                $email, $webPage, $bPhone, $fax, $hPhone, $mPhone, $address, $city,
                $state, $zip, $country, $notes, $filePath, $supCode);
        }
        else {
            $res = supplier::updateSupplier($supplierid, $firstName, $lastName, $jobTitle, $company,
                $email, $webPage, $bPhone, $fax, $hPhone, $mPhone, $address, $city,
                $state, $zip, $country, $notes, $filePath, $supCode);
        }
        
        echo $res;       
    }
    
    public function addshippermodal($shipperid = 0) {
        $shipperdetail = null;
        
        if($shipperid != 0) {
            $shipperdetail = shipper::getShipperById($shipperid);
        }
        return view('modals.ShipperDetailModal', compact('shipperdetail'));
    }
    
    public function saveshipper($shipperid=0){
        $imageName = Input::get('imageName');
        $imageChanged = Input::get('hasImage');
        $file = Input::file('imageData');
        $firstName = Input::get('firstName');
        $lastName = Input::get('lastName');
        $jobTitle = Input::get('jobTitle');
        $company = Input::get('company');
        $email = Input::get('email');
        $webPage = Input::get('webPage');
        $bPhone = Input::get('bPhone');
        $fax = Input::get('fax');
        $hPhone = Input::get('hPhone');
        $mPhone = Input::get('mPhone');
        $address = Input::get('address');
        $city = Input::get('city');
        $state = Input::get('state');
        $zip = Input::get('zip');
        $country = Input::get('country');
        $notes = Input::get('notes');
        
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
        
        if($shipperid == 0)
        {
            $res = shipper::addShipper($firstName, $lastName, $jobTitle, $company,
                $email, $webPage, $bPhone, $fax, $hPhone, $mPhone, $address, $city,
                $state, $zip, $country, $notes, $filePath);
        }
        else {
            $res = shipper::updateShipper($shipperid, $firstName, $lastName, $jobTitle, $company,
                $email, $webPage, $bPhone, $fax, $hPhone, $mPhone, $address, $city,
                $state, $zip, $country, $notes, $filePath);
        }
        
        echo $res;       
    }
    
    public function addcategorymodal($categoryid = 0) {
        $categorydetail = null;
        
        if($categoryid != 0) {
            $categorydetail = products::getCategoryById($categoryid);
        }
        return view('modals.ProductCategoryModal', compact('categorydetail'));
    }
    
    public function savecategory($categoryid=0){
        $categoryName = Input::get('categoryName');
        $categoryCode = Input::get('categoryCode');
        
        $res = 0;
        
        if($categoryid == 0)
        {
            $res = products::addCategory($categoryName, $categoryCode);
        }
        else {
            $res = products::updateCategory($categoryid, $categoryName, $categoryCode);
        }
        
        echo $res;       
    }
    
    
}
