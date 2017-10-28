<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\customer;
use App\shipper;
use App\products;
use App\orders;
use App\supplier;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
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
    
    public function test()
    {
        phpinfo();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'dashboard';
        $dashBoardData = Dashboard::getDashboardData();
        $activeOrders = $dashBoardData['active_orders'];
        $inventoryReorder = $dashBoardData['inventoryReorder'];
        return view('home', compact('page', 'activeOrders', 'inventoryReorder'));
    }
    
    public function suppliers(){
        $page = 'supplier';
        return view('suppliers', compact('page'));
    }
    
    public function purchaseorders(){
        $page = 'purchaseorder';
        return view('purchaseorder', compact('page'));
    }
    public function customerordermodal( $orderid = 0 ) 
    {
        $customers = customer::getCustomers();
        $users = Dashboard::getUsers();
        $shippers = shipper::getShippers();
        $products = products::getProductsList(false, true);
        
        $orderInfo = null;
        $orderDetailInfo = [];
        
        if($orderid == 0) 
        {
            return view('customer.customerOrder', compact('customers', 'users', 'shippers', 'products', 'orderInfo', 'orderDetailInfo'));
        }
        else 
        {
            $orderInfo = orders::getOrderById($orderid);
            $orderDetailInfo = orders::getOrderDetailByOrderId($orderid);
            
            return view('customer.customerOrder', compact('customers', 'users', 'shippers', 'products', 'orderInfo', 'orderDetailInfo'));
        }
    }
    
    public function savecustomerorder( )
    {
        $orderId = Input::get('orderId');
        $orderStatus = Input::get('orderStatus');
        $reqStatusId = Input::get('reqStatusId');
        
        $customerId = Input::get('customerId');
        $userId = Input::get('userId');
        
        $arrProductIds = Input::get('arrProductIds');
        $arrQuantities = Input::get('arrQuantities');
        $arrUnitPrices = Input::get('arrUnitPrices');
        $arrDiscounts = Input::get('arrDiscounts');
        $arrTotalPrices = Input::get('arrTotalPrices');
        $arrStatuses = Input::get('arrStatuses');
        
        $arrProductIds =  explode("^|^", $arrProductIds);
        $arrQuantities =  explode("^|^", $arrQuantities);
        $arrUnitPrices =  explode("^|^", $arrUnitPrices);
        $arrDiscounts =  explode("^|^", $arrDiscounts);
        $arrTotalPrices =  explode("^|^", $arrTotalPrices);
        $arrStatuses =  explode("^|^", $arrStatuses);
        
        $shipViaId = Input::get('shipViaId');        
        $shipDate = Input::get('shipDate');        
        $shipFee = Input::get('shipFee');        
        $shipName = Input::get('shipName');        
        $shipAddress = Input::get('shipAddress');        
        $shipCity = Input::get('shipCity');        
        $shipState = Input::get('shipState');        
        $shipZip = Input::get('shipZip');        
        $shipCountry = Input::get('shipCountry');        

        $orderDate = Input::get('orderDate');
        $paymentTypeId = Input::get('paymentTypeId');
        $paymentDate = Input::get('paymentDate');
        $taxRate = Input::get('taxRate');
        $notes = Input::get('notes');
        
        $subTotal = Input::get('subTotal');
        $tax = Input::get('tax');
        $orderTotal = Input::get('orderTotal');
        
        $currencyType = Input::get('currencyType');
        $currencyValue = Input::get('currencyValue');
        
        if($orderStatus == 'New' && ($reqStatusId == '0' || $reqStatusId == '10')){
            $processOrder = orders::checkSelectedPoroductsQualtitAvailable($arrProductIds, $arrQuantities);
            if($processOrder !== true){
                echo json_encode(array('status'=>'error', 'message'=>$processOrder));
                return;
            }
        }
        
        $res = 0;
        
        $res = orders::saveOrder( $orderId, $orderStatus, $reqStatusId, $customerId, $userId, $arrProductIds, 
                $arrQuantities, $arrUnitPrices, $arrDiscounts, $arrTotalPrices, $arrStatuses, $shipViaId, 
                $shipDate, $shipFee, $shipName, $shipAddress, $shipCity, $shipState, $shipZip, $shipCountry, 
                $orderDate, $paymentTypeId, $paymentDate, $taxRate, $notes, $subTotal, $tax, $orderTotal, $currencyType, $currencyValue);
        
        echo json_encode(array('status'=>'success', 'message'=>'', 'result'=>$res));
    }
    
    public function cancelcustomerorder()
    {
        $orderId = Input::get('orderId');
        $res = orders::cancelOrder($orderId);
        echo $res;
    }
    // ========== Purchase Order Popup ========== 
    
    public function purchaseordermodal( $orderid = 0, $productid = 0 ){
        $suppliers = supplier::getSuppliers();
        
        $orderInfo = null;
        $orderDetailInfo = [];
        $supplierProducts = [];
        $supplierProductsTemp = [];
        $productInfo = null;
        $inventoryInfo = null;
        
        if($orderid == 0 && $productid == 0) 
        {
            return view('purchase.modal.addPurchaseOrder', compact('suppliers', 'orderInfo', 'orderDetailInfo', 'supplierProducts', 'supplierProductsTemp', 'productInfo', 'inventoryInfo'));
        }
        else 
        {
            if($orderid == 0) 
            {
                $inventoryInfo = products::getInventoryByProductId($productid);
                $productInfo = products::getProductById($productid);
                $supplierProductsTemp = products::getProductsBySupplierId($productInfo[0]->supplier_id, true);
                $supplierProducts = [];
                foreach ($supplierProductsTemp as $product)
                {
                    $supplierProducts[$product->id] = $product;
                }
                
                return view('purchase.modal.addPurchaseOrder', compact('suppliers', 'orderInfo', 'orderDetailInfo', 'supplierProducts', 'supplierProductsTemp', 'productInfo', 'inventoryInfo'));
            }
            else if($productid == 0) 
            {
                $orderInfo = orders::getPurchaseOrderById($orderid);
                $orderDetailInfo = orders::getPurchaseOrderDetailByPOId($orderid);
                $supplierProductsTemp = products::getProductsBySupplierId($orderInfo[0]->supplier_id, true);
                $supplierProducts = [];
                foreach ($supplierProductsTemp as $product)
                {
                    $supplierProducts[$product->id] = $product;
                }
                
                return view('purchase.modal.addPurchaseOrder', compact('suppliers', 'orderInfo', 'orderDetailInfo', 'supplierProducts', 'supplierProductsTemp', 'productInfo', 'inventoryInfo'));
            }
        }
    }
    
    public function getproductsbysupplierid()
    {
        $supplierId = Input::get('supplierId');
        
        $products = products::getProductsBySupplierId($supplierId, true);
        
        echo json_encode($products);
    }
    
    
    public function savepurchaseorder( )
    {
        $orderId = Input::get('orderId');
        $orderStatus = Input::get('orderStatus');
        $reqStatusId = Input::get('reqStatusId');
        
        $supplierId = Input::get('supplierId');
        $expectedDate = Input::get('expectedDate');
        $createdBy = Input::get('createdBy');
        $createDate = Input::get('createDate');
        $submittedBy = Input::get('submittedBy');
        $submittedDate = Input::get('submittedDate');
        $closedBy = Input::get('closedBy');
        $closedDate = Input::get('closedDate');
        
        $arrProductIds = Input::get('arrProductIds');
        $arrQuantities = Input::get('arrQuantities');
        $arrUnitPrices = Input::get('arrUnitPrices');
        $arrTotalPrices = Input::get('arrTotalPrices');
        
        $arrProductIds =  explode("^|^", $arrProductIds);
        $arrQuantities =  explode("^|^", $arrQuantities);
        $arrUnitPrices =  explode("^|^", $arrUnitPrices);
        $arrTotalPrices =  explode("^|^", $arrTotalPrices);
        
        $arrInvProductIds = Input::get('arrInvProductIds');
        $arrInvQuantities = Input::get('arrInvQuantities');
        $arrInvReceivedDates = Input::get('arrInvReceivedDates');
        $arrInvPostToInvs = Input::get('arrInvPostToInvs');
        
        $arrInvProductIds =  explode("^|^", $arrInvProductIds);
        $arrInvQuantities =  explode("^|^", $arrInvQuantities);
        $arrInvReceivedDates =  explode("^|^", $arrInvReceivedDates);
        $arrInvPostToInvs =  explode("^|^", $arrInvPostToInvs);
        
        $paymentTypeId = Input::get('paymentTypeId');
        $paymentDate = Input::get('paymentDate');
        $notes = Input::get('notes');
        
        $subTotalPurchase = Input::get('subTotalPurchase');
        
        $currencyType = Input::get('currencyType');
        $currencyValue = Input::get('currencyValue');
        
        $res = 0;
        
        $res = orders::savePurchaseOrder( $orderId, $orderStatus, $reqStatusId, $supplierId, $expectedDate, $createdBy, 
                $createDate, $submittedBy, $submittedDate, $closedBy, $closedDate, $arrProductIds, 
                $arrQuantities, $arrUnitPrices, $arrTotalPrices, $arrInvProductIds, $arrInvQuantities, 
                $arrInvReceivedDates, $arrInvPostToInvs, $paymentTypeId, $paymentDate, $notes, $subTotalPurchase, $currencyType, $currencyValue);
        
        echo $res;
    }
    
    public function cancelpurchaseorder( )
    {
        $orderId = Input::get('orderId');
        $res = orders::cancelPurchaseOrder( $orderId);
        echo $res;
    }
}
