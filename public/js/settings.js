$(document).ready(function(){
    $('#btnSaveSettings').click(function(){
        saveSettings();
    });
    
//    $(document).on('click', '.userinfo', function(){
//        loadAddUserPopup($(this).text());
//    });
//    
//    $(document).on('change', '#inpImage', function(){
//        onImageChange();
//    });
    
});

function saveSettings()
{
    $("#lblMessage").hide();
    
    if(validateFormSettings() == true)
    {
        $.ajax({
            url: 'savesettings',       
            method: "POST",
            data: {
                
                bill_address : $("#txtBillAddress").val() ,
                bill_city : $("#txtBillCity").val() ,
                bill_state : $("#txtBillState").val() ,
                bill_zip : $("#txtBillZip").val() ,
                bill_country : $("#txtBillCountry").val(),
                ship_address : $("#txtShipAddress").val() ,
                ship_city : $("#txtShipCity").val() ,
                ship_state : $("#txtShipState").val() ,
                ship_zip : $("#txtShipZip").val() ,
                ship_country : $("#txtShipCountry").val(),
                
                _token : $("#tokensettings").val()
                
            },      
            complete: function(response){
                var res = response['responseText'];
                $("#lblMessage").show();
                //alert('settings saved: ' + res);
                //window.location.reload(); 
                
            }
        });
    }
    
}

function validateFormSettings()
{
    var res = true;
    
    if($( '#txtBillAddress' ).val() == "")
    {
        alert('Please enter bill address.');
        res = false;
    }
    else if($( '#txtShipAddress' ).val() == "")
    {
        alert('Please enter ship address.');
        res = false;
    }
    
    return res;
}
