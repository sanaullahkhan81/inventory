$(document).ready(function(){
    $('#btn-add-product').click(function(){
        loadAddProductPopup();
    });
    
    $(document).on('click', '.productinfo', function(){
        loadEditProductPopup($(this).attr("productid"));
    });
    
    $(document).on('click', '#btn-add-shrinkage', function(){
        addShrinkageFields();
    });
    
    $(document).on('click', '.editshrinkage', function(){
        editShrinkageFields( this );
    });
    
    $(document).on('change', '#drpCategoryProduct', function(){
        generateProductCode();
    });
    
    $(document).on('change', '#drpSupplierProduct', function(){
        generateProductCode();
    });
    
    $(document).on('change', '#txtStandardCost', function(){
        updateListPrice();
    });
    
    $(document).on('change', '#inpFile', function(){
        onProductChange();
    });
});

function onProductChange()
{
    var imgData = $('#inpFile')[0].files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#imgProduct').attr('src', e.target.result);
    }
    reader.readAsDataURL(imgData);
}

function loadAddProductPopup(){
    $.ajax({    

        url: "loadAddProductModel",       
        data: {

        },      
        complete: function(response){
            $('#addProduct').html(response['responseText']);
        }  
    });
}
function loadEditProductPopup(id){
    $.ajax({    

        url: "loadAddProductModel/" + id,       
        data: {

        },      
        complete: function(response){
            $('#addProduct').html(response['responseText']);
            $('#addProduct').modal('toggle');
        }  
    });
}

function generateProductCode()
{
    var cate = $('#drpCategoryProduct option:selected').text();
    var supp = $('#drpSupplierProduct option:selected').text();

    cate = cate.substring(0, 2);
    supp = supp.substring(0, 2);
        
    var prId = $('#hiddenproductid').val();
    if(prId == 0)
    {
        $('#txtProductCode').val(supp + cate); 
    }
    else
    {
        $('#txtProductCode').val(supp + cate + prId); 
    }
}

function updateListPrice()
{
    var sc = $('#txtStandardCost').val();
    var pv = sc * 30 / 100;
    var lp = 1 * sc + pv;
    $('#txtListPrice').val(lp);
}

function saveAddEditProduct(productId){
//    var values = $("input[name='shrinkagedate[]']").map(function(){return $(this).val();}).get();
//    alert(values);
//    return;
    
    if(validateFormProduct(productId) == false)
    {
        alert('Please fill all fields.');
    }
    else {
        var dataForm = new FormData();
        dataForm.append('imageName', $('#imgProduct').attr('src'));
        dataForm.append('hasImage', $('#inpFile')[0].files.length);
        dataForm.append('imageData', $('#inpFile')[0].files[0]);
        
        dataForm.append('productName', $("#txtProductName").val());
        dataForm.append('productCode', $("#txtProductCode").val());
        dataForm.append('standardCost', $("#txtStandardCost").val());
        dataForm.append('category', $("#drpCategoryProduct").val());
        dataForm.append('listPrice', $("#txtListPrice").val());
        dataForm.append('supplier', $("#drpSupplierProduct").val());
        dataForm.append('qtyPerUnit', $("#txtQtyPerUnit").val());
        dataForm.append('discontinued', $("#chbDiscontinued").prop('checked')==true?'1':'0');
        dataForm.append('description', $("#txtDescription").val());
        dataForm.append('supcode', $("#txtSupCode").val());
        dataForm.append('supitemcode', $("#txtSupItemCode").val());
        dataForm.append('size', $("#txtSize").val());
        
        dataForm.append('invInitialLevel', $("#txtInitialLevel").val());
        dataForm.append('invMinReorderQty', $("#txtMinReorderQty").val());
        dataForm.append('invReorderLevel', $("#txtReorderLevel").val());
        dataForm.append('invTargetLevel', $("#txtTargetLevel").val());
        dataForm.append('invShrinkagedates', $("input[name='shrinkagedate[]']").map(function(){return $(this).val();}).get().join("^|^"));
        dataForm.append('invShrinkagequantities', $("input[name='shrinkagequantity[]']").map(function(){return $(this).val();}).get().join("^|^"));
        dataForm.append('invShrinkagereasons', $("input[name='shrinkagereason[]']").map(function(){return $(this).val();}).get().join("^|^"));

        dataForm.append('_token', $("#tokenaddprodect").val());
        
        var url = (productId != 0)?'saveProduct/'+productId:'saveProduct';
        $.ajax({
            url: url,       
            method: "POST",
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            data: dataForm,       
            complete: function(response){
                //alert("inserted id: " + response['responseText'])
                if(response['responseText'] == 0)
                {
                    alert('Product not saved successfully.');
                }
                else
                {
                    $('#addProduct').modal('toggle');
                    window.location.reload();
                }
                
            }
        });
    }
    
    
    //return false;
}

function validateFormProduct(pId)
{
    var res = true;
    
    if($( '#txtProductName' ).val() == "")
    {
        res = false;
    }
    else if($( '#txtProductCode' ).val() == "")
    {
        res = false;
    }
    else if($( '#txtStandardCost' ).val() == "")
    {
        res = false;
    }
    else if($( '#txtListPrice' ).val() == "")
    {
        res = false;
    }
//    $('#tab_product_details input').each(function( index ) {
//        alert( index + ": " + $( this ).attr('id') );
//        if($( this ).val() == "")
//        {
//            res = false;
//        }
//    });
    
    $('#tab_product_details select').each(function( index ) {
        if($( this ).val() == "0")
        {
            res = false;
        }
    });
    
    
    if(pId != 0)
    {
        $('#tab_inventory input').each(function( index ) {
            if($( this ).val() == "")
            {
                res = false;
            }
        });
    }
    
    return res;
}

// ===== 2nd tab of product deatil dialog ===== 

function tabSelected(tIndex)
{
    var pId = $("#hiddenproductid").val();
    //alert("index: " + tIndex);
    if(pId != "")
    {
        if(tIndex == 1)
        {

        }
        else if(tIndex == 2)
        {
            getProductOrderHistory(pId)
        }
        else if(tIndex == 3)
        {
            getProductPurchaseHistory(pId)
        }
        else if(tIndex == 4)
        {
            
        }
    }
}

function getProductOrderHistory(prodId)
{
    $.ajax({    

        url: "getProdOrderHistory/" + prodId,       
        data: {
            _token : $("#tokenaddprodect").val()
        },      
        complete: function(response){
            //alert(response['responseText']);
            $("#tblProdOrderHistory").html(response['responseText']);
        }  
    });
}

function getProductPurchaseHistory(prodId)
{
    $.ajax({    

        url: "getProdPuchaseHistory/" + prodId,       
        data: {
            _token : $("#tokenaddprodect").val()
        },      
        complete: function(response){
            //alert(response['responseText']); //tblProdPurchaseHistory
            $("#tblProdPurchaseHistory").html(response['responseText']);
        }  
    });
}

function addShrinkageFields()
{
    //alert($('.shrinkageentry').length);

    var sehtml = '<tr class="even pointer">';
    sehtml += '<td class="col-md-2">';
    sehtml += '<input class="editfield form-control shrinkagedate" name="shrinkagedate[]" value="" />';
    sehtml += '</td>';
    sehtml += '<td class="col-md-2">';
    sehtml += '<input class="editfield form-control shrinkagequantity" name="shrinkagequantity[]" value="" />';
    sehtml += '</td>';
    sehtml += '<td class="col-md-7">';
    sehtml += '<input class="editfield form-control shrinkagereason" name="shrinkagereason[]" value="" />';
    sehtml += '</td>';
    sehtml += '<td class="col-md-1">';
    sehtml += '</td>';
    sehtml += '</tr>';
    
    $("#shrinkagetable").append(sehtml);
    addDateListener();
}

function addDateListener()
{
    $('.shrinkagedate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 
}

function editShrinkageFields( btn )
{
    //$(btn).parent().parent().css( "background-color", "red" );
    $(btn).parent().parent().find(".labelfield").hide();
    $(btn).parent().parent().find(".editfield").show();
    addDateListener();
}