<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function suppliers(){
        $page = 'suppliers';
        $suppliers = supplier::getSuppliers();
        return view('products', compact('page', 'suppliers'));
    }
}
