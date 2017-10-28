$(document).ready(function(){
    $('#btn-add-user').click(function(){
        loadAddUserPopup(0);
    });
    
    $(document).on('click', '.userinfo', function(){
        loadAddUserPopup($(this).text());
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

function loadAddUserPopup(userId){
    
    var url = (userId != 0)?'loadAddUserModal/'+userId:'loadAddUserModal';
    
    $.ajax({    

        url: url,       
        data: {

        },      
        complete: function(response){
            $('#addUser').html(response['responseText']);
            if(userId != 0){
                $('#addUser').modal('toggle');
            }
        }  
    });
}

function saveAddEditUser(userId){
    if(validateFormUser() == false)
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
        dataForm.append('email', $("#txtEmail").val());
        dataForm.append('password', $("#txtPassword").val());
        dataForm.append('userType', $("#drpUserType").val());
        dataForm.append('active', $("#drpActive").val());
        dataForm.append('_token', $("#tokenadduser").val());
        
        var url = (userId != 0)?'saveUser/'+userId:'saveUser';
        $.ajax({    
            url: url,       
            method: "POST",
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            data: dataForm,
            complete: function(response){
                var res = response['responseText'];
                //alert("inserted id: " + res)
                if(res == -1)
                {
                    alert('User already exist.');
                }
                else if(res == 0)
                {
                    alert('User not saved successfully.');
                }
                else
                {
                    $('#userDetail').modal('toggle');
                    window.location.reload();
                }
            }
            
        });
    }
    
    
    //return false;
}

function validateFormUser()
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
    else if($( '#txtPassword' ).val() == "")
    {
        alert('Please enter password.');
        res = false;
    }
    else if($( '#txtPassword' ).val().length < 8)
    {
        alert('Please enter password of length 8.');
        res = false;
    }
    
    return res;
}

