<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes();

Route::get('/test', 'HomeController@test');
Route::get('/dashboard', 'HomeController@index');
Route::get('/products', 'ProductsController@index');
Route::get('/inventorylevels', 'ProductsController@inventorylevels');
Route::get('/needsrestocking', 'ProductsController@needsrestocking');
Route::get('/discontinued', 'ProductsController@discontinuedproducts');
Route::get('/productcategory', 'ProductsController@productcategory');
Route::get('/productsuppliers', 'ProductsController@suppliers');
Route::get('/orders', 'OrdersController@index');
Route::get('/needinvoicing', 'OrdersController@needinvoicing');
Route::get('/readytoship', 'OrdersController@readytoship');
Route::get('/awaitingpayment', 'OrdersController@awaitingpayment');
Route::get('/completedorders', 'OrdersController@completedorders');
Route::get('/ordercustomers', 'OrdersController@customers');
Route::get('/ordershippers', 'OrdersController@shippers');
Route::get('/suppliers', 'HomeController@suppliers');
Route::get('/purchaseorders', 'HomeController@purchaseorders');

Route::get('/loadCustomerOrderModel/{orderid?}', 'HomeController@customerordermodal');
Route::post('/saveCustomerOrder', 'HomeController@savecustomerorder');
Route::post('/cancelCustomerOrder', 'HomeController@cancelcustomerorder');
Route::get('/getCustomerById', 'CustomerController@getcustomerbyid');
Route::get('/viewCustomerOrderInvoice', 'CustomerController@viewcustomerorderinvoice');
Route::get('/viewCustomerOrderInvoice/pdf', 'CustomerController@viewcustomerorderinvoicepdf');
Route::get('/viewPurchaseOrderInvoice/pdf', 'OrdersController@viewpurchaseorderinvoicepdf');

Route::get('/loadPurchaseOrderModel/{orderid?}/{productid?}', 'HomeController@purchaseordermodal');
Route::get('/getProductsBySupplierId', 'HomeController@getproductsbysupplierid');
Route::post('/savePurchaseOrder', 'HomeController@savepurchaseorder');
Route::post('/cancelPurchaseOrder', 'HomeController@cancelpurchaseorder');

Route::get('/loadAddProductModel/{productid?}', 'ProductsController@addproductmodal');
Route::post('/saveProduct/{productid?}', 'ProductsController@saveproduct');

Route::get('/getProdOrderHistory/{productid?}', 'ProductsController@getProdOrderHistory');
Route::get('/getProdPuchaseHistory/{productid?}', 'ProductsController@getProdPuchaseHistory');

//======= purchases tab routs ==========//
Route::get('/purchases', 'OrdersController@purchases');
Route::get('/awaitingapproval', 'OrdersController@awaitingapproval');
Route::get('/inventoryreceiving', 'OrdersController@inventoryreceiving');
Route::get('/completedpurchases', 'OrdersController@completedpurchases');
Route::get('/purchasessuppliers', 'OrdersController@purchasessuppliers');

//======= advanced tab routs ==========//
Route::get('/customers', 'AdvancedController@customers');
Route::get('/suppliers', 'AdvancedController@suppliers');
Route::get('/categories', 'AdvancedController@categories');
Route::get('/shippers', 'AdvancedController@shippers');

Route::get('/loadAddCustomerModal/{customerid?}', 'AdvancedController@addcustomermodal');
Route::post('/saveCustomer/{customerid?}', 'AdvancedController@savecustomer');

Route::get('/loadAddSupplierModal/{supplierid?}', 'AdvancedController@addsuppliermodal');
Route::post('/saveSupplier/{supplierid?}', 'AdvancedController@savesupplier');

Route::get('/loadAddShipperModal/{shipperid?}', 'AdvancedController@addshippermodal');
Route::post('/saveShipper/{shipperid?}', 'AdvancedController@saveshipper');

Route::get('/loadAddCategoryModal/{categoryid?}', 'AdvancedController@addcategorymodal');
Route::post('/saveCategory/{categoryid?}', 'AdvancedController@savecategory');

//======= users tab routs ==========//
Route::get('/userlist', 'UserController@userlist');
Route::get('/loadAddUserModal/{userid?}', 'UserController@addusermodal');
Route::post('/saveUser/{userid?}', 'UserController@saveuser');
Route::post('/restUserPassword', 'UserController@restuserpassword');

//======= settings tab routs ==========//
Route::get('/settings', 'SettingsController@getSettings');
Route::post('/savesettings', 'SettingsController@saveSettings');

//======= reports tab routs ==========//
Route::get('/reportcenter', 'ReportsController@reportcenter');

Route::get('/reportcustomers', 'ReportsController@reportcustomers');
Route::get('/reportsuppliers', 'ReportsController@reportsuppliers');
Route::get('/reportactiveorders', 'ReportsController@reportactiveorders');

Route::get('/salegroupsdata', 'ReportsController@salegroupsdata');
Route::get('/reportyearlysales', 'ReportsController@reportyearlysales');

Route::get('/reportquarterlysales', 'ReportsController@reportquarterlysales');
Route::get('/reportmonthlysales', 'ReportsController@reportmonthlysales');