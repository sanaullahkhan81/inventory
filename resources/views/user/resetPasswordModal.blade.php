<div id="changePasswordModal" class="modal fade" role="dialog" style="display: none;">
    

<!-- Modal -->
<div class="modal-dialog" style='width: 50%; '>
    
    <input id="tokenresetpassword" type="hidden" name="token" value="{{ csrf_token() }}" />
    <input id="hiddenuserid" type="hidden" name="id" value="" />
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
<!--            <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <h2>Change Password</h2>
        </div>
        
        <div class="modal-body">
            
            <div class="">
                <form class="form-horizontal" role="form">
                    <fieldset>
                        <div id="user_detail_form" class="col-sm-12">
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    
                                    <label class="col-sm-12 form-label" for="textinput">New Password</label>
                                    <div class="col-sm-12">
                                        <input id="txtNewPassword" class="form-control" type="password" value="" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Confirm Password</label>
                                    <div class="col-sm-12">
                                        <input id="txtConfirmPassword" class="form-control" type="password" value="" >
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </fieldset>
                </form>
            </div>
            
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="resetUserPassword()" >Reset</button>
        </div>
    </div>
    
</div>
</div>
<script>
$(document).ready(function(){
   
   $('#changePasswordModal').show();
   //$('#changePasswordModal').modal();
   $('#changePasswordModal').modal({backdrop: 'static', keyboard: false})  
   
});

function resetUserPassword()
{
    if(validateFormResetPassword() == false)
    {
        //alert('Please fill all fields.');
    }
    else 
    {
        $.ajax({
            url: 'restUserPassword',       
            method: "POST",
            data: {
                newPassword : $("#txtNewPassword").val() ,
                
                _token : $("#tokenresetpassword").val()
                
            },      
            complete: function(response){
                var res = response['responseText'];
                //alert("restUserPassword result: " + res);
                if(res == 0)
                {
                    alert('Password did not changed.');
                }
                else
                {
                    window.location.reload(); 
                }
                
            }
        });
    }
}

function validateFormResetPassword()
{
    var res = true;
    
    if($( '#txtNewPassword' ).val() == "")
    {
        alert('Please enter new password.');
        res = false;
    }
    else if($( '#txtNewPassword' ).val().length < 8)
    {
        alert('Please enter password of length 8.');
        res = false;
    }
    else if($( '#txtConfirmPassword' ).val() == "")
    {
        alert('Please enter confirm password.');
        res = false;
    }
    else if($( '#txtNewPassword' ).val() != $( '#txtConfirmPassword' ).val())
    {
        alert('Confirm password not matched.');
        res = false;
    }
    
    return res;
}

</script>

