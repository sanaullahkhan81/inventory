$(document).ready(function(){
    // from dashboard page test
    $('#btn-customer-order').click(function(){
        loadCustomerOrderPopup(0);
    });
    // from order management pages
    $('#btn-add-order').click(function(){
        loadCustomerOrderPopup(0);
    });
    // from table of different pages
    $(document).on('click', '.customerorderinfo', function(){
        loadCustomerOrderPopup($(this).text());
    });
    
    $(document).on('change', '#drpCustomer', function(){
        onSelectCustomer( this );
    });
    $(document).on('click', '#btn-add-product', function(){
        addProductFields();
    });
    
    $(document).on('click', '.deleteproductrow', function(){
        deleteProductRow( this );
    });
    
    $(document).on('change', '.drpProductNames', function(){
        onSelectProduct( this );
    });
    
    $(document).on('change', '.quantity', function(){
        calculatePrice( this );
    });
    $(document).on('change', '.discount', function(){
        calculatePrice( this );
    });
    $(document).on('change', '#txtShippingFee', function(){
        calculateFreight( this );
    });
    $(document).on('change', '#txtTaxRate', function(){
        calculateTax( this );
    });
    
    // ========== Purchase Order Popup ========== 
    // from dashboard page
    $('#btn-create-purchase-order').click(function(){
        loadPurchaseOrderPopup(0, 0);
    });
    // from purchase management pages
    $('#btn-add-purchase-order').click(function(){
        loadPurchaseOrderPopup(0, 0);
    });
    // from table of different pages
    $(document).on('click', '.purchaseorderinfo', function(){
        loadPurchaseOrderPopup($(this).text(), 0);
    });
    
    $(document).on('click', '.restockinfo', function(){
        loadPurchaseOrderPopup(0, $(this).attr('productid'));
    });
    $(document).on('click', '.purchaseinfo', function(){
        loadPurchaseOrderPopup(0, $(this).attr('productid'));
    });
    
    $(document).on('change', '#drpSuppliers', function(){
        onSelectSupplier( this );
    });
    
    $(document).on('click', '#btn-add-supplier-product', function(){
        addSupplierProductFields();
    });
    
    $(document).on('click', '.deleteproductrowpurchase', function(){
        deleteProductRowPurchase( this );
    });
    
    $(document).on('change', '.drpSupplierProductNames', function(){
        onSelectSupplierProduct( this );
    });
    
    $(document).on('change', '.quantitypurchase', function(){
        calculatePricePurchaseItem( this );
    });
    
    $(document).on('change', '.posttoinv', function(){
        onCheckPostToInventory( this );
    });
    
    // ========== General Methods ========== 
    
    $(document).on('change', '.field-amount', function(){
        checkDollarSign( this );
    });
    $(document).on('change', '.field-percent', function(){
        checkPercentSign( this );
    });
    
    // =========== currency control =========//
    $(document).on('change', '#selectPoCurrencyType', function(){
        if($(this).val() == 1){
            $('#txtPoCurrencyValue').val('1');
            $('#txtPoCurrencyValue').hide();
        }else{
            $('#txtPoCurrencyValue').val('1');
            $('#txtPoCurrencyValue').show();
        }
        onChangeSupplierCurrency();
    });
    $(document).on('change', '#selectCoCurrencyType', function(){
        if($(this).val() == 1){
            $('#txtCoCurrencyValue').val('1');
            $('#txtCoCurrencyValue').hide();
        }else{
            $('#txtCoCurrencyValue').val('1');
            $('#txtCoCurrencyValue').show();
        }
        onChangeCustomerCurrency();
    });
    
    $(document).on('keydown', '#txtPoCurrencyValue', function(e) {   
        var key   = e.keyCode ? e.keyCode : e.which;
        if (!( [8, 9, 13, 27, 46, 110, 190].indexOf(key) !== -1 ||
         (key == 65 && ( e.ctrlKey || e.metaKey  ) ) || 
         (key >= 35 && key <= 40) ||
         (key >= 48 && key <= 57 && !(e.shiftKey || e.altKey)) ||
         (key >= 96 && key <= 105)
       )) e.preventDefault();
    });
    
    $(document).on('keydown', '#txtCoCurrencyValue', function(e) {   
        var key   = e.keyCode ? e.keyCode : e.which;
        if (!( [8, 9, 13, 27, 46, 110, 190].indexOf(key) !== -1 ||
         (key == 65 && ( e.ctrlKey || e.metaKey  ) ) || 
         (key >= 35 && key <= 40) ||
         (key >= 48 && key <= 57 && !(e.shiftKey || e.altKey)) ||
         (key >= 96 && key <= 105)
       )) e.preventDefault();
    });
    
    $(document).on('keyup', '#txtPoCurrencyValue', function(e) { 
        /*if($(this).val() == ""){
           $(this).val('1'); 
        }*/
        onChangeSupplierCurrency();
    });
    $(document).on('keyup', '#txtCoCurrencyValue', function(e) { 
        /*if($(this).val() == ""){
           $(this).val('1'); 
        }*/
        onChangeCustomerCurrency();
    });
});



var dataSaved = false;

function loadCustomerOrderPopup(customerOrderId)
{
    var url = (customerOrderId != 0)?'loadCustomerOrderModel/'+customerOrderId:'loadCustomerOrderModel';
    
    $.ajax({    
        
        url: url,       
        data: {
            
        },      
        complete: function(response){
            $('#newCustomerOrder').html(response['responseText']);
        }  
    });
}

function onSelectCustomer(drp)
{
    var cusId = $(drp).val();
    
    if(cusId != 0)
    {
        $.ajax({    
            
            url: "getCustomerById",       
            data: {
                customerId : cusId ,
                
                _token : $("#tokenaddorder").val()
            },      
            complete: function(response){
                var res = response['responseText'];
                var customer = $.parseJSON(res);
                populateCustomerInfo(customer[0]);
                //alert(customer[0].company);
            }  
        });
    }
}

function populateCustomerInfo(customer)
{
    $('#txtShipName').val(customer['customer_name']);
    $('#txtAddress').val(customer['address']);
    $('#txtCity').val(customer['city']);
    $('#txtState').val(customer['state']);
    $('#txtZip').val(customer['zip']);
    $('#txtCountry').val(customer['country']);
}
function addProductFields()
{
    var strOrderStatus = $('.spnOrderStatus').text();
    if(strOrderStatus == "Invoiced" || 
            strOrderStatus == "Shipped"|| 
            strOrderStatus == 'Completed')
    {
        return;
    }
    
    var phtml = '<tr class="even pointer">';
    
    phtml += '<td class="col-md-1">';
    phtml += '<img class="propic" src="" style="with: 40px; height: 30px;" >';
    phtml += '</td>';
    
    phtml += '<td class="col-md-3">';
    phtml += '<select name="quanity" class="form-control drpProductNames chosen-select" data-placeholder="Select Product">';
//    phtml += '<option value="0">Please Select</option>';
    phtml += '<option value=""></option>';
    for (i = 0; i < arrProducts.length; i++) { 
        phtml += '<option value=' + arrProducts[i]['id'] + '>';
        phtml += arrProducts[i]['product_code'];
        phtml += '_';
        phtml += arrProducts[i]['product_name'];
        phtml += ', ';
        phtml += arrProducts[i]['sup_item_code'];
        phtml += '_';
        phtml += arrProducts[i]['sup_name'];
        phtml += '</option>';
    }
    phtml += '</select>';
    phtml += '</td>';
    
    phtml += '<td class="col-md-2">';
    phtml += '<input  class="form-control quantity" type="number" name="quantity" min="1" max="" value="0">';
    phtml += '</td>';
    
    phtml += '<td class="col-md-1">';
    phtml += '<input class="form-control unitprice" type="text" name="unitprice" data-unitp="0" disabled value="0" onchange="setTwoNumberDecimal()" />';
    phtml += '</td>';
    
    phtml += '<td class="col-md-1">';
    phtml += '<input class="form-control discount" type="number" name="discount" min="0" max="10" value="0" onchange="handlepersign()" >';
    phtml += '</td>';
    
    phtml += '<td class="col-md-2">';
    phtml += '<input class="form-control totalprice" type="text" name="totalprice" disabled value="0" onchange="setTwoNumberDecimal()" />';
    phtml += '</td>';
    
    phtml += '<td class="col-md-1">';
    phtml += '<a href="javascript:void(0);" class="link status" statusid="0" >None</a>';
    phtml += '</td>';
    
    phtml += '<td class="col-md-1">';
    phtml += '<a href="javascript:void(0);" class="link deleteproductrow"><u>Delete</u></a>';
    phtml += '</td>';
    
    phtml += '</tr>';
    
    $("#productstable").append(phtml);

    //- auto complete dropdown work
    $(".chosen-select").chosen();
    $(".chosen-select").width("100%");
}

function deleteProductRow(btn)
{
    var strOrderStatus = $('.spnOrderStatus').text();
    if(strOrderStatus == "Invoiced" || 
            strOrderStatus == "Shipped"|| 
            strOrderStatus == 'Completed')
    {
        return;
    }
    
    //$(btn).parent().parent().css( "background-color", "red" );
    $(btn).parent().parent().remove();
    calculateSubTotal();
}
var selectedProducts = [];
function onSelectProduct(drp)
{
    var previousItemId= $(drp).data("lastSelection");
    $(drp).data("lastSelection",$(drp).val());
    if(previousItemId != '0' && previousItemId != 'undefined' && selectedProducts.indexOf(previousItemId) != -1){
        selectedProducts.splice(selectedProducts.indexOf(previousItemId), 1);
    }
    var proId = $(drp).val();
    if(selectedProducts.indexOf(proId) != -1){
        alert('This product already selected for current order.');
        $(drp).val(0);
        return;
    }
    var product = getProductInfoById(proId);
    var row = $(drp).parent().parent();
    if(proId != '0'){
        selectedProducts.push(proId);
    }
    var pi = product['attachments'];
    pi = (pi == null) ? 'product.jpg' : pi;
    $(row).find('.propic').attr('src', 'uploads/'+pi);
    $(row).find('.quantity').val('');
    $(row).find('.quantity').attr('max', product['available'] );
    var currecyValue = $('#txtCoCurrencyValue').val();
    $(row).find('.unitprice').val(product['list_price']*currecyValue);
    $(row).find('.unitprice').data('unitp', product['list_price']);
    $(row).find('.discount').val('0');//.val('0%');
    $(row).find('.totalprice').val('0');
    
    calculateSubTotal();
}

function onChangeCustomerCurrency(){
    $('.unitprice').each(function(){
        var currecyValue = $('#txtCoCurrencyValue').val();
        $(this).val($(this).data('unitp')*currecyValue);
        calculatePrice(this);
    });
    //calculateSubTotalPurchase();
}

function getProductInfoById(pid)
{
    var pro = null;
    for (i = 0; i < arrProducts.length; i++) { 
        if(arrProducts[i]['id'] == pid) {
            pro = arrProducts[i];
            break;
        }
    }
    return pro;
}

function calculatePrice(elm)
{
    var row = $(elm).parent().parent();
    var strQty = parseInt( $(row).find('.quantity').val() );
    var maxQty = parseInt( $(row).find('.quantity').attr('max') );
    if(strQty > maxQty)
    {
        strQty = maxQty;
        $(row).find('.quantity').val(strQty);
    }
    var strUP = $(row).find('.unitprice').val();
    var currecyValue = $('#txtCoCurrencyValue').val();
    //strUP = strUP.substring(1);
    
//    checkPercentSign($(row).find('.discount'));
    var strDis = $(row).find('.discount').val();
//    strDis = strDis.substring(0, strDis.length-1);
    
    var strA = strQty * strUP;
    var strD = strA * strDis / 100;
    var strTP = strA - strD;
    
    $(row).find('.totalprice').val(strTP.toFixed(2));
    //alert(strDis);
    calculateSubTotal();
}

function calculateSubTotal()
{
    var rows = $('#productstable .totalprice');
    var subTotal = 0;
    var pt;
    $(rows).each(function( index ) {
        //console.log( index + ": " + $( this ).text() );
        pt = $( this ).val();
        pt = parseFloat( pt );
        subTotal = subTotal + pt;
    });
    
    $('#lblSubTotal').html(subTotal.toFixed(2));
    calculateTotal();
    //alert("sub total: " + subTotal);
}

function calculateFreight(itm)
{
    var currencyValue = $('#txtCoCurrencyValue').val();
    $('#lblFreight').html($(itm).val());
    calculateTotal();
}

function calculateTax(itm)
{
    var tax = $(itm).val();
    var currencyValue = $('#txtCoCurrencyValue').val();
    tax = (tax.substring(0, tax.length-1));
    var subTotal = $('#lblSubTotal').html();
    subTotal = parseFloat( subTotal );
    tax = subTotal * tax / 100;
    
    $('#lblTax').html(tax.toFixed(2));
    calculateTotal();
}

function calculateTotal()
{
    //lblSubTotal, lblFreight, lblTax, lblOrderTotal
    var currencyValue = $('#txtCoCurrencyValue').val();
    var subTotal = $('#lblSubTotal').html();
    subTotal = parseFloat( subTotal );
    var freight = $('#lblFreight').html();
    freight = parseFloat( freight );
    var tax = $('#lblTax').html();
    tax = parseFloat( tax );
    
    var orderTotal = (subTotal + freight + tax);
    $('#lblOrderTotal').html(orderTotal.toFixed(2));
}

function onClearAddress()
{
    $("#txtAddress").val('');
    $("#txtCity").val('');
    $("#txtState").val('');
    $("#txtZip").val('');
    $("#txtCountry").val('');
}

function saveAddEditCustomerOrder(orderStatusId, strAction)
{
    if(orderStatusId == 10 && $('#btnInvoiceOrder').text() == 'View Invoice' && strAction != 'close')
    {
        showInvoice();
        return;
    }
    
    if(validateFormCustomerOrder(orderStatusId) == false)
    {
        //alert('Please fill all fields.');
    }
    else 
    {
        var arrProductIds = $("#productstable .drpProductNames").map(function(){return $(this).val();}).get().join("^|^");
        var arrQuantities = $("#productstable .quantity").map(function(){return $(this).val();}).get().join("^|^");
        var arrUnitPrices = $("#productstable .unitprice").map(function(){return $(this).val();}).get().join("^|^");
        var arrDiscounts = $("#productstable .discount").map(function(){return $(this).val();}).get().join("^|^");
        var arrTotalPrices = $("#productstable .totalprice").map(function(){return $(this).val();}).get().join("^|^");
        var arrStatuses = $("#productstable .status").map(function(){return $(this).attr('statusid');}).get().join("^|^");
        
        var strShippingFee = $("#txtShippingFee").val();
        var strTaxRate = $("#txtTaxRate").val();
        var strSubTotal = $("#lblSubTotal").text();
        var strTax = $("#lblTax").text();
        var strOrderTotal = $("#lblOrderTotal").text();
        
        // replace $,% etc from strings
        arrUnitPrices = arrUnitPrices.split('$').join('');
//        arrDiscounts = arrDiscounts.split('%').join('');
        arrTotalPrices = arrTotalPrices.split('$').join('');
        strShippingFee = strShippingFee.split('$').join('');
        strTaxRate = strTaxRate.split('%').join('');
        strSubTotal = strSubTotal.split('$').join('');
        strTax = strTax.split('$').join('');
        strOrderTotal = strOrderTotal.split('$').join('');
        
        $.ajax({
            url: 'saveCustomerOrder',       
            method: "POST",
            data: {
                orderId : $('.spnOrderId').text() ,
                orderStatus : $('.spnOrderStatus').text() ,
                reqStatusId : orderStatusId ,
                
                customerId : $("#drpCustomer").val() ,
                userId : $("#txtSalePerson").attr('userid') ,
                
                arrProductIds : arrProductIds,
                arrQuantities :arrQuantities ,
                arrUnitPrices : arrUnitPrices,
                arrDiscounts : arrDiscounts,
                arrTotalPrices : arrTotalPrices,
                arrStatuses : arrStatuses,
                
                shipViaId : $("#drpShipVia").val() ,
                shipDate : $("#txtShipDate").val() ,
                shipFee : strShippingFee ,
                shipName : $("#txtShipName").val() ,
                shipAddress : $("#txtAddress").val() ,
                shipCity : $("#txtCity").val(),
                shipState : $("#txtState").val() ,
                shipZip : $("#txtZip").val() ,
                shipCountry : $("#txtCountry").val() ,
                
                orderDate : $("#txtOrderDate").val() ,
                paymentTypeId : $("#drpPaymentType").val() ,
                paymentDate : $("#txtPaymentDate").val() ,
                taxRate : strTaxRate ,
                notes : $("#txtNotes").val() ,
                
                subTotal : strSubTotal ,
                tax : strTax ,
                orderTotal : strOrderTotal ,
                
                currencyType : $('#selectCoCurrencyType').val(),
                currencyValue : $('#txtCoCurrencyValue').val(),
                
                _token : $("#tokenaddorder").val()
                
            },      
            complete: function(response){
                var responseJson = $.parseJSON(response['responseText']);
                if(responseJson.status == 'error'){
                    alert(responseJson.message);
                    return;
                }else{
                    var res = responseJson.result;
                }
                //alert("inserted id: " + res);
                if(strAction == 'close' || orderStatusId == 30)// it mean save and close
                {
                    window.location.reload(); 
                }
                else
                {
                    dataSaved = true;
                    // reload popup
                    loadCustomerOrderPopup(res);
                }
                
            }
        });
        
    }
}

function showInvoice()
{
    
    var url = 'viewCustomerOrderInvoice/pdf?orderId=' + $('.spnOrderId').text();
    var win = window.open(url, '_blank');
    if (win) {
        //Browser has allowed it to be opened
        win.focus();
    } else {
        //Browser has blocked it
        alert('Please allow popups for this website');
    }
}

function checkForReload()
{
    if(dataSaved == true)
    {
        window.location.reload();  
    }
}
function validateFormCustomerOrder(orderStatusId)
{
    var res = true;
    
    if($('#drpCustomer').val() == 0)
    {
        alert("Please select customer first.");
        res = false; 
    }
    else if(orderStatusId == 10 || orderStatusId == 0)
    {
        if(orderStatusId == 10 && $('#drpShipVia').val() == 0)
        {
            alert("Please select shipper first.");
            res = false; 
        }
        else if($('#productstable').children().length == 0)
        {
            alert("Please add minimum one product.");
            res = false; 
        }
        else
        {
            $('#tab_content1 select').each(function( index ) {
                if($( this ).val() == "0")
                {
                    alert("Please select product.");
                    res = false;
                    return false;
                }
            });
            $('#tab_content1 input[name="quantity"]').each(function( index ) {
                if($( this ).val() == "" || $( this ).val() <= 0)
                {
                    alert("Quantity of product must be grater than 0.");
                    res = false;
                    return false;
                }
            });
            /*$('#tab_content1 input').each(function( index ) {
                if($( this ).val() == "" || $( this ).val() <= 0)
                {
                    alert("Please fill all product fields.");
                    res = false;
                    return false;
                }
            });*/
        }
    }
    else if(orderStatusId == 20)
    {
        if($('#drpShipVia').val() == 0)
        {
            alert("Please select shipper first.");
            res = false; 
        }
        else
        {
            $('#tab_content2 input').each(function( index ) {
                if($( this ).val() == "")
                {
                    alert("Please specify shipping date or fee.");
                    res = false;
                    return false;
                }
            });
        }
    }
    else if(orderStatusId == 30)
    {
        if($('#drpShipVia').val() == 0)
        {
            alert("Please select shipper first.");
            res = false; 
        }
        else
        {
           $('#tab_content3 select').each(function( index ) {
                if($( this ).val() == "0")
                {
                    alert("Please specify payment type.");
                    res = false;
                    return false;
                }
            });

            $('#tab_content3 input').each(function( index ) {
                if($( this ).val() == "")
                {
                    alert("Please specify payment date or tax rate.");
                    res = false;
                    return false;
                }
            }); 
        }
        
//        $('#tab_content3 textarea').each(function( index ) {
//            if($( this ).val() == "")
//            {
//                res = false;
//            }
//        });
    }
    
    return res;
}

function cancelCustomerOrder()
{
    if (confirm('Are you sure you want to cancel this customer order?')) {
        $.ajax({
            url: 'cancelCustomerOrder',       
            method: "POST",
            data: {
                orderId : $('.spnOrderId').text() ,
                
                _token : $("#tokenaddorder").val()
                
            },      
            complete: function(response){
                var res = response['responseText'];
                if(res == 'done')
                {
                    //alert('Order has been canceled.');
                    window.location.reload(); 
                }
                else 
                {
                    alert('Problem on cancel order.');
                }
            }
        });
    }
    
}
// ========== Purchase Order Popup ========== 

function loadPurchaseOrderPopup(purchaseOrderId, productId){
    var url = (purchaseOrderId != 0 || productId != 0)?'loadPurchaseOrderModel/'+purchaseOrderId+'/'+productId:'loadPurchaseOrderModel';
    
    $.ajax({
        
        url: url,       
        data: {
            
        },      
        complete: function(response){
            $('#newPurchaseOrder').html(response['responseText']);
            if(purchaseOrderId != 0)
            {
                //$('#newPurchaseOrder').modal('toggle');
            }
        }  
    });
}

function onSelectSupplier(drp)
{
    //alert($('#supplierproductstable .rowSupplierProducts').length);
    var supId = $(drp).val();
    
    if(supId != 0)
    {
        if($('#supplierproductstable .rowSupplierProducts').length > 0)
        {
            alert("Changing supplier will remove purchase line items.");
            $('#supplierproductstable').html('');
            calculateSubTotalPurchase();
        }
        $.ajax({    
            
            url: "getProductsBySupplierId",       
            data: {
                supplierId : supId ,
                
                _token : $("#tokenaddpurchase").val()
            },      
            complete: function(response){
                arrSupplierProducts = $.parseJSON(response['responseText']);
                
            }  
        });
    }
    
    //alert(supId);
}

function addSupplierProductFields()
{
    var strOrderStatus = $('.spnOrderStatusPurchase').text();
    if(strOrderStatus == "Submitted" || strOrderStatus == 'Completed')
    {
        return;
    }
    
    var sid = $('#drpSuppliers').val();
    if(sid == undefined || sid == 0)
    {
        //alert("SupplierId: " + sid);
        alert('Please select supplier first.');
        return;
    }
    
    var phtml = '<tr class="even pointer rowSupplierProducts">';
    
    phtml += '<td class="col-md-1">';
    phtml += '<img class="propicpurchase" src="" style="with: 40px; height: 30px;" >';
    phtml += '</td>';
    
    phtml += '<td class="col-md-4">';
    phtml += '<select name="quanity" class="form-control drpSupplierProductNames chosen-select" data-placeholder="Select Product" >';
    phtml += '<option value=""></option>';
    for (i = 0; i < arrSupplierProducts.length; i++) { 
        phtml += '<option value=' + arrSupplierProducts[i]['id'] + '>';
        phtml += arrSupplierProducts[i]['product_code'];
        phtml += '_';
        phtml += arrSupplierProducts[i]['product_name'];
        phtml += ', ';
        phtml += arrSupplierProducts[i]['sup_item_code'];
        phtml += '_';
        phtml += arrSupplierProducts[i]['sup_name'];
        phtml += '</option>';
    }
    phtml += '</select>';
    phtml += '</td>';
    
    phtml += '<td class="col-md-2">';
    phtml += '<input  class="form-control quantitypurchase" type="number" name="quantity" min="1" max="" value="0" data-unitp="0">';
    phtml += '</td>';
    
    phtml += '<td class="col-md-2">';
    phtml += '<input class="form-control unitpricepurchase" type="text" name="unitprice" disabled value="0" onchange="setTwoNumberDecimal()" />';
    phtml += '</td>';
    
    phtml += '<td class="col-md-2">';
    phtml += '<input class="form-control totalpricepurchase" type="text" name="totalprice" disabled value="0" onchange="setTwoNumberDecimal()" />';
    phtml += '</td>';
    
    phtml += '<td class="col-md-1">';
    phtml += '<a href="javascript:void(0);" class="link deleteproductrowpurchase"><u>Delete</u></a>';
    phtml += '</td>';
    
    phtml += '</tr>';
    
    
    $("#supplierproductstable").append(phtml);
    
    $(".chosen-select").chosen();
    $(".chosen-select").width("100%");
}

function deleteProductRowPurchase(btn)
{
    var strOrderStatus = $('.spnOrderStatusPurchase').text();
    if(strOrderStatus == "Submitted" || strOrderStatus == 'Completed')
    {
        return;
    }
    
    //$(btn).parent().parent().css( "background-color", "red" );
    $(btn).parent().parent().remove();
    calculateSubTotalPurchase();
}

function onSelectSupplierProduct(drp)
{
    var proId = $(drp).val();
    var product = getSupplierProductInfoById(proId);
    var row = $(drp).parent().parent();
    var currecyValue = $('#txtPoCurrencyValue').val();
    
    var pi = product['attachments'];
    pi = (pi == null) ? 'product.jpg' : pi;
    $(row).find('.propicpurchase').attr('src', 'uploads/'+pi);
    
    $(row).find('.quantitypurchase').val('');
    $(row).find('.unitpricepurchase').val((product['standard_cost']*currecyValue));
    $(row).find('.unitpricepurchase').data('unitp', product['standard_cost']);
    $(row).find('.totalpricepurchase').val('0');
    //alert("name: " + product['product_name']);
    calculateSubTotalPurchase();
}

function onChangeSupplierCurrency(){
    $('.unitpricepurchase').each(function(){
        var currecyValue = $('#txtPoCurrencyValue').val();
        $(this).val($(this).data('unitp')*currecyValue);
        calculatePricePurchaseItem(this);
    });
    calculateSubTotalPurchase();
}

function getSupplierProductInfoById(pid)
{
    var pro = null;
    for (i = 0; i < arrSupplierProducts.length; i++) { 
        if(arrSupplierProducts[i]['id'] == pid) {
            pro = arrSupplierProducts[i];
            break;
        }
    }
    return pro;
}

function calculatePricePurchaseItem(elm)
{
    var row = $(elm).parent().parent();
    var strQty = $(row).find('.quantitypurchase').val();
    var strUP = $(row).find('.unitpricepurchase').val();
    //strUP = strUP.substring(1);
    
    var strA = strQty * strUP;
    
    $(row).find('.totalpricepurchase').val(strA.toFixed(2));
    //alert(strDis);
    calculateSubTotalPurchase();
}

function calculateSubTotalPurchase()
{
    var rows = $('#supplierproductstable .totalpricepurchase');
    var subTotal = 0;
    var pt;
    $(rows).each(function( index ) {
        //console.log( index + ": " + $( this ).text() );
        pt = $( this ).val();
        pt = parseFloat( pt );
        subTotal = subTotal + pt;
    });
    
    $('#lblSubTotalPurchase').html(subTotal.toFixed(2));
}

function getCurrentDateFormated()
{
    var curDate = new Date();
    var strD = curDate.getDate().toString();
    var strM = (curDate.getMonth()+1).toString();
    strD = (strD.length == 1) ? '0'+strD : strD;
    strM = (strM.length == 1) ? '0'+strM : strM;
    return strM + '/' + strD + '/' + curDate.getFullYear();
}

function onCheckPostToInventory(chb)
{
    var isChecked = $(chb).prop('checked');
    var row = $(chb).parent().parent();
    if(isChecked)
    {
        $(row).find('.receivedateinv').val(getCurrentDateFormated());
    }
    else
    {
        $(row).find('.receivedateinv').val('');
    }
}

function saveAddEditPurchaseOrder(orderStatusId, strAction)
{
    //    alert("SubmittedBy: " + $("#txtSubmittedBy").attr('submittedbyid'));
    //    return;
    if(orderStatusId == -1)
    {
        var strOrderStatus = $('.spnOrderStatusPurchase').text();
        if(strOrderStatus == "New") {
            orderStatusId = 0;
        }
        else if(strOrderStatus == "Submitted") {
            orderStatusId = 10;
        }
        else if(strOrderStatus == 'Completed') {
            orderStatusId = 20;
        } 
    }
    
    if(validateFormPurchaseOrder(orderStatusId) == false)
    {
        //alert('Please fill all fields.');
    }
    else 
    {
        var arrProductIds = $("#supplierproductstable .drpSupplierProductNames").map(function(){return $(this).val();}).get().join("^|^");
        var arrQuantities = $("#supplierproductstable .quantitypurchase").map(function(){return $(this).val();}).get().join("^|^");
        var arrUnitPrices = $("#supplierproductstable .unitpricepurchase").map(function(){return $(this).val();}).get().join("^|^");
        var arrTotalPrices = $("#supplierproductstable .totalpricepurchase").map(function(){return $(this).val();}).get().join("^|^");
        
        var arrInvProductIds = $("#supplierinventoriestable .productnameinv").map(function(){return $(this).val();}).get().join("^|^");
        var arrInvQuantities = $("#supplierinventoriestable .quantityinv").map(function(){return $(this).val();}).get().join("^|^");
        var arrInvReceivedDates = $("#supplierinventoriestable .receivedateinv").map(function(){return $(this).val();}).get().join("^|^");
        var arrInvPostToInvs = $("#supplierinventoriestable .posttoinv").map(function(){return $(this).prop('checked');}).get().join("^|^");
        
        var strSubTotal = $("#lblSubTotalPurchase").text();
        
        // replace $,% etc from strings
        arrUnitPrices = arrUnitPrices.split('$').join('');
        arrTotalPrices = arrTotalPrices.split('$').join('');
        strSubTotal = strSubTotal.split('$').join('');
        // replace false -> 0, true -> 1
        arrInvPostToInvs = arrInvPostToInvs.split('false').join('0');
        arrInvPostToInvs = arrInvPostToInvs.split('true').join('1');
        
        var submittedBy = null;
        var submittedDate = null;
        var closedBy = null;
        var closedDate = null;
        if(orderStatusId == 0)
        {
            
        }
        else if(orderStatusId == 10)
        {
            submittedBy = $("#txtSubmittedBy").attr('submittedbyid');
            submittedDate = $("#txtSubmittedDate").attr('submitteddate');
        }
        else if(orderStatusId == 20)
        {
            submittedBy = $("#txtSubmittedBy").attr('submittedbyid');
            submittedDate = $("#txtSubmittedDate").val();
            closedBy = $("#txtClosedBy").attr('closedbyid');
            closedDate = $("#txtClosedDate").attr('closeddate');
        }
        
        
        
        $.ajax({    
            
            url: 'savePurchaseOrder',       
            method: "POST",
            data: {
                orderId : $('.spnOrderIdPurchase').text() ,
                orderStatus : $('.spnOrderStatusPurchase').text() ,
                reqStatusId : orderStatusId ,
                
                supplierId : $("#drpSuppliers").val() ,
                expectedDate : $("#txtExpectedDate").val() ,
                createdBy : $("#txtCreatedBy").attr('createdbyid') ,
                createDate : $("#txtCreateDate").val() ,
                submittedBy : submittedBy ,
                submittedDate : submittedDate ,
                closedBy : closedBy ,
                closedDate : closedDate ,
                
                arrProductIds : arrProductIds,
                arrQuantities : arrQuantities,
                arrUnitPrices : arrUnitPrices,
                arrTotalPrices : arrTotalPrices,
                
                arrInvProductIds : arrInvProductIds,
                arrInvQuantities : arrInvQuantities,
                arrInvReceivedDates : arrInvReceivedDates,
                arrInvPostToInvs : arrInvPostToInvs,
                
                paymentTypeId : $("#drpPaymentTypePurchase").val() ,
                paymentDate : $("#txtPaymentDatePurchase").val() ,
                notes : $("#txtNotesPurchase").val() ,
                
                subTotalPurchase : strSubTotal ,
                
                currencyType : $('#selectPoCurrencyType').val(),
                currencyValue : $('#txtPoCurrencyValue').val(),
                
                _token : $("#tokenaddpurchase").val()
                
            },      
            complete: function(response){
                var res = response['responseText'];
                //alert("inserted id: " + res);
                if(strAction == 'close' || orderStatusId == 20)// it mean save and close
                {
                    window.location.reload(); 
                }
                else
                {
                    dataSaved = true;
                    // reload popup
                    loadPurchaseOrderPopup(res, 0);
                }
            }
            
        });
        
    }
}

function validateFormPurchaseOrder(orderStatusId)
{
    var res = true;
    
    if($( '#drpSuppliers' ).val() == "0")
    {
        alert("Please select supplier first.");
        res = false;
    }
    else if($( '#txtExpectedDate' ).val() == "")
    {
        alert("Please specify Expected Date.");
        res = false;
    }
    else if($( '#txtCreatedBy' ).val() == "")
    {
        alert("Please specify Created By.");
        res = false;
    }
    else if($( '#txtCreateDate' ).val() == "")
    {
        alert("Please specify Created Date.");
        res = false;
    }else if($( '#txtPoCurrencyValue' ).val() == "" || isNaN($( '#txtPoCurrencyValue' ).val())){
        if($( '#selectPoCurrencyType' ).val() == 1){
            $( '#txtPoCurrencyValue' ).val('1');
        }else{
            if(isNaN($( '#txtPoCurrencyValue' ).val())){
                alert("Please enter numeric currency value.");
            }else{
                alert("Please specify currency value.");
            }
            res = false;
        }
    }
    else if(orderStatusId == 10 || orderStatusId == 0)
    {
        if($('#supplierproductstable').children().length == 0)
        {
            alert("Please add minimum one product.");
            res = false; 
        }
        else
        {
            $('#purchase_tab_content1 select').each(function( index ) {
                if($( this ).val() == "0")
                {
                    alert("Please select product.");
                    res = false;
                    return false;
                }
            });
            $('#purchase_tab_content1 .quantitypurchase').each(function( index ) {
                if($( this ).val() == "" || $( this ).val() <= 0)
                {
                    alert("Quantity of product must be grater than 0.");
                    res = false;
                    return false;
                }
            });
            $('#purchase_tab_content1 input').each(function( index ) {
                if($( this ).val() == "")
                {
                    alert("Please fill all product fields.");
                    res = false;
                    return false;
                }
            });
        }
    }
    else if(orderStatusId == 20)
    {
        if($( '#txtSubmittedBy' ).val() == "")
        {
            alert("Please specify Submitted By.");
            res = false;
        }
        else if($( '#txtSubmittedDate' ).val() == "")
        {
            alert("Please specify Submitted Date.");
            res = false;
        }
        else 
        {
            $('#purchase_tab_content2 input:text').each(function( index ) {
                if($( this ).val() == "")
                {
                    alert("Please specify received date of inventory.");
                    res = false;
                    return false;
                }
            });
            $('#purchase_tab_content2 input:checkbox').each(function( index ) {
                if($( this ).prop('checked') == false)
                {
                    alert("Please check for post to inventory.");
                    res = false;
                    return false;
                }
            });

            $('#purchase_tab_content3 select').each(function( index ) {
                if($( this ).val() == "0")
                {
                    alert("Please specify payment type.");
                    res = false;
                    return false;
                }
            });
            $('#purchase_tab_content3 input').each(function( index ) {
                if($( this ).val() == "")
                {
                    alert("Please specify payment date.");
                    res = false;
                    return false;
                }
            });
//            $('#purchase_tab_content3 textarea').each(function( index ) {
//                if($( this ).val() == "")
//                {
//                    res = false;
//                }
//            });
        }
    }
    
    return res;
}

function cancelPurchaseOrder()
{
    if (confirm('Are you sure you want to cancel this purchase order?')) {
        $.ajax({
            url: 'cancelPurchaseOrder',       
            method: "POST",
            data: {
                orderId : $('.spnOrderIdPurchase').text() ,
                
                _token : $("#tokenaddpurchase").val()
                
            },      
            complete: function(response){
                var res = response['responseText'];
                if(res == 'done')
                {
                    //alert('Order has been canceled.');
                    window.location.reload(); 
                }
                else 
                {
                    alert('Problem on cancel order.');
                }
            }
        });
    }
    
}

function checkDollarSign(fld) {
    var myValue = $(fld).val();

    if (myValue.indexOf("$") !== 0)
    {
        myValue = myValue;
    }
    
    $(fld).val(myValue);
}

function checkPercentSign(fld) {
    var myValue = $(fld).val();

    if (myValue.indexOf("%") === -1)
    {
        myValue = myValue + "%"  ;
    }
    
    $(fld).val(myValue);
}