$(document).ready(function(){
    $('#btn-add-customer').click(function(){
        loadAddCustomerPopup(0);
    });
    
    $(document).on('click', '.customerinfo', function(){
        loadAddCustomerPopup($(this).text());
    });
    
    $('#btn-add-supplier').click(function(){
        loadAddSupplierPopup(0);
    });
    
    $(document).on('click', '.supplierinfo', function(){
        loadAddSupplierPopup($(this).text());
    });
    
    $('#btn-add-shipper').click(function(){
        loadAddShipperPopup(0);
    });
    
    $(document).on('click', '.shipperinfo', function(){
        loadAddShipperPopup($(this).text());
    });
    
    $('#btn-add-category').click(function(){
        loadAddCategoryPopup(0);
    });
    
    $(document).on('click', '.categoryinfo', function(){
        loadAddCategoryPopup($(this).text());
    });
    
    $(document).on('change', '#inpImage', function(){
        onImageChange();
    });
});

function onImageChange()
{
    var imgData = $('#inpImage')[0].files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#imgUser').attr('src', e.target.result);
    }
    reader.readAsDataURL(imgData);
}

function validateImage()
{
    if($('#inpImage')[0].files.length == 1)
    {
        alert($('#inpImage')[0].files[0].name);
    }
    //var imgData = $('#inpImage')[0].files[0];
    
}

function loadAddCustomerPopup(customerId){
    
    var url = (customerId != 0)?'loadAddCustomerModal/'+customerId:'loadAddCustomerModal';
    
    $.ajax({    

        url: url,       
        data: {

        },      
        complete: function(response){
            $('#customerDetail').html(response['responseText']);
            if(customerId != 0){
                $('#customerDetail').modal('toggle');
            }
        }  
    });
}

function saveAddEditCustomer(customerId){
    if(validateForm() == false)
    {
        //alert('Please fill all fields.');
    }
    else {
        var dataForm = new FormData();
        dataForm.append('imageName', $('#imgUser').attr('src'));
        dataForm.append('hasImage', $('#inpImage')[0].files.length);
        dataForm.append('imageData', $('#inpImage')[0].files[0]);
        dataForm.append('firstName', $("#txtFirstName").val());
        dataForm.append('lastName', $("#txtLastName").val());
        dataForm.append('jobTitle', $("#txtJobTitle").val());
        dataForm.append('company', $("#txtCompany").val());
        dataForm.append('email', $("#txtEmail").val());
        dataForm.append('webPage', $("#txtWebPage").val());
        dataForm.append('bPhone', $("#txtBPhone").val());
        dataForm.append('fax', $("#txtFax").val());
        dataForm.append('hPhone', $("#txtHPhone").val());
        dataForm.append('mPhone', $("#txtMPhone").val());
        dataForm.append('address', $("#txtAddress").val());
        dataForm.append('city', $("#txtCity").val());
        dataForm.append('state', $("#txtState").val());
        dataForm.append('zip', $("#txtZip").val());
        dataForm.append('country', $("#txtCountry").val());
        dataForm.append('notes', $("#txtNotes").val());
        dataForm.append('_token', $("#tokenaddcustomer").val());
        
        var url = (customerId != 0)?'saveCustomer/'+customerId:'saveCustomer';
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
                    alert('Customer not saved successfully.');
                }
                else
                {
                    $('#customerDetail').modal('toggle');
                    window.location.reload();
                }
            }
            
        });
    }
    
    
    //return false;
}

function validateForm()
{
    var res = true;
    
    if($( '#txtFirstName' ).val() == "")
    {
        alert('Please enter first name.');
        res = false;
    }
    else if($( '#txtLastName' ).val() == "")
    {
        alert('Please enter last name.');
        res = false;
    }
    else if($( '#txtEmail' ).val() == "")
    {
        alert('Please enter email address.');
        res = false;
    }
    
    return res;
}

function loadAddSupplierPopup(supplierId){
    
    var url = (supplierId != 0)?'loadAddSupplierModal/'+supplierId:'loadAddSupplierModal';
    
    $.ajax({    

        url: url,       
        data: {

        },      
        complete: function(response){
            $('#supplierDetail').html(response['responseText']);
            if(supplierId != 0){
                $('#supplierDetail').modal('toggle');
            }
        }  
    });
}

function saveAddEditSupplier(supplierId){
    if(validateFormSupplier() == false)
    {
        //alert('Please fill all fields.');
    }
    else {
        var dataForm = new FormData();
        dataForm.append('imageName', $('#imgUser').attr('src'));
        dataForm.append('hasImage', $('#inpImage')[0].files.length);
        dataForm.append('imageData', $('#inpImage')[0].files[0]);
        dataForm.append('firstName', $("#txtFirstName").val());
        dataForm.append('lastName', $("#txtLastName").val());
        dataForm.append('jobTitle', $("#txtJobTitle").val());
        dataForm.append('supCode', $("#txtSupCode").val());
        dataForm.append('company', $("#txtCompany").val());
        dataForm.append('email', $("#txtEmail").val());
        dataForm.append('webPage', $("#txtWebPage").val());
        dataForm.append('bPhone', $("#txtBPhone").val());
        dataForm.append('fax', $("#txtFax").val());
        dataForm.append('hPhone', $("#txtHPhone").val());
        dataForm.append('mPhone', $("#txtMPhone").val());
        dataForm.append('address', $("#txtAddress").val());
        dataForm.append('city', $("#txtCity").val());
        dataForm.append('state', $("#txtState").val());
        dataForm.append('zip', $("#txtZip").val());
        dataForm.append('country', $("#txtCountry").val());
        dataForm.append('notes', $("#txtNotes").val());
        dataForm.append('_token', $("#tokenaddsupplier").val());
        
        var url = (supplierId != 0)?'saveSupplier/'+supplierId:'saveSupplier';
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
                    alert('Supplier not saved successfully.');
                }
                else
                {
                    $('#supplierDetail').modal('toggle');
                window.location.reload();
                }
            }
            
        });
    }
    
    
    //return false;
}

function validateFormSupplier()
{
    var res = true;
    
    if($( '#txtCompany' ).val() == "")
    {
        alert('Please enter company.');
        res = false;
    }
    else if($( '#txtFirstName' ).val() == "")
    {
        alert('Please enter first name.');
        res = false;
    }
    else if($( '#txtLastName' ).val() == "")
    {
        alert('Please enter last name.');
        res = false;
    }
    
    return res;
}

function loadAddShipperPopup(shipperId){
    
    var url = (shipperId != 0)?'loadAddShipperModal/'+shipperId:'loadAddShipperModal';
    
    $.ajax({    

        url: url,       
        data: {

        },      
        complete: function(response){
            $('#shipperDetail').html(response['responseText']);
            if(shipperId != 0){
                $('#shipperDetail').modal('toggle');
            }
        }  
    });
}

function saveAddEditShipper(shipperId){
    if(validateFormShipper() == false)
    {
        //alert('Please fill all fields.');
    }
    else {
        var dataForm = new FormData();
        dataForm.append('imageName', $('#imgUser').attr('src'));
        dataForm.append('hasImage', $('#inpImage')[0].files.length);
        dataForm.append('imageData', $('#inpImage')[0].files[0]);
        dataForm.append('firstName', $("#txtFirstName").val());
        dataForm.append('lastName', $("#txtLastName").val());
        dataForm.append('jobTitle', $("#txtJobTitle").val());
        dataForm.append('company', $("#txtCompany").val());
        dataForm.append('email', $("#txtEmail").val());
        dataForm.append('webPage', $("#txtWebPage").val());
        dataForm.append('bPhone', $("#txtBPhone").val());
        dataForm.append('fax', $("#txtFax").val());
        dataForm.append('hPhone', $("#txtHPhone").val());
        dataForm.append('mPhone', $("#txtMPhone").val());
        dataForm.append('address', $("#txtAddress").val());
        dataForm.append('city', $("#txtCity").val());
        dataForm.append('state', $("#txtState").val());
        dataForm.append('zip', $("#txtZip").val());
        dataForm.append('country', $("#txtCountry").val());
        dataForm.append('notes', $("#txtNotes").val());
        dataForm.append('_token', $("#tokenaddshipper").val());
        
        var url = (shipperId != 0)?'saveShipper/'+shipperId:'saveShipper';
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
                    alert('Shipper not saved successfully.');
                }
                else
                {
                    $('#shipperDetail').modal('toggle');
                    window.location.reload();
                }
            }
            
        });
    }
    
    
    //return false;
}

function validateFormShipper()
{
    var res = true;
    
    if($( '#txtCompany' ).val() == "")
    {
        alert('Please enter company.');
        res = false;
    }
    
    return res;
}

function loadAddCategoryPopup(categoryId){
    
    var url = (categoryId != 0)?'loadAddCategoryModal/'+categoryId:'loadAddCategoryModal';
    
    $.ajax({    

        url: url,       
        data: {

        },      
        complete: function(response){
            $('#categoryDetail').html(response['responseText']);
            if(categoryId != 0){
                $('#categoryDetail').modal('toggle');
            }
        }  
    });
}

function saveAddEditCategory(categoryId){
    if(validateFormCategory() == false)
    {
        alert('Please enter category name.');
    }
    else {
        var url = (categoryId != 0)?'saveCategory/'+categoryId:'saveCategory';
        $.ajax({    

            url: url,       
            method: "POST",
            data: {
                categoryName : $("#txtCategoryName").val() ,
                categoryCode : $("#txtCatCode").val(),
                _token : $("#tokenaddcategory").val()
                
            },      
            complete: function(response){
                //alert("inserted id: " + response['responseText'])
                $('#categoryDetail').modal('toggle');
                window.location.reload();
            }
            
        });
    }
    
    
    //return false;
}

function validateFormCategory()
{
    var res = true;
    
    $('#category_detail_form input').each(function( index ) {
        //alert( index + ": " + $( this ).val() );
        if($( this ).val() == "")
        {
            res = false;
        }
    });
    
    return res;
}

