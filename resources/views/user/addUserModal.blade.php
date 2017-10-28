<!-- Modal -->
<div class="modal-dialog" style='width: 70%'>
    
    <input id="tokenadduser" type="hidden" name="token" value="{{ csrf_token() }}" />
    <input id="hiddenuserid" type="hidden" name="token" value="{{(($userdetail != null)?$userdetail[0]->id:'')}}" />
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2>User Details</h2>
        </div>
        
        <div class="modal-body">
            
            <div class="">
                <form class="form-horizontal" role="form">
                    <fieldset>
                        <div id="user_detail_form" class="col-sm-12">
                            
                            <div class="col-sm-2">
                                <img id="imgUser" src="uploads/{{(($userdetail != null && $userdetail[0]->attachments != null)?$userdetail[0]->attachments:'user.jpg')}}" style="with: 100%; height: 173px;" >
                                <input id="inpImage" type="file" name="image" accept="image/*" />
                            </div>
                            
                            <div class="col-sm-5">
                                <div class="form-group">
                                    
                                    <label class="col-sm-12 form-label" for="textinput">First Name</label>
                                    <div class="col-sm-12">
                                        <input id="txtFirstName" class="form-control" type="text" value="{{(($userdetail != null)?$userdetail[0]->first_name:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">E-mail</label>
                                    <div class="col-sm-12">
                                        <input id="txtEmail" class="form-control" type="text" {{(($userdetail != null)?'disabled':'')}} value="{{(($userdetail != null)?$userdetail[0]->email:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">User Type</label>
                                    <div class="col-sm-12">
                                        <select id="drpUserType" name="paymenttype" class="form-control">
                                            <option value="0" {{(($userdetail != null && $userdetail[0]->user_type == 0)?'selected':'')}} >Normal User</option>
                                            <option value="1" {{(($userdetail != null && $userdetail[0]->user_type == 1)?'selected':'')}} >Admin</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-5">
                                <div class="form-group">
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Last Name</label>
                                    <div class="col-sm-12">
                                        <input id="txtLastName" class="form-control" type="text" value="{{(($userdetail != null)?$userdetail[0]->last_name:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Password</label>
                                    <div class="col-sm-12">
                                        <input id="txtPassword" class="form-control" type="password" {{(($userdetail != null)?'disabled':'')}} value="{{(($userdetail != null)?'00000000':'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Active</label>
                                    <div class="col-sm-12">
                                        <select id="drpActive" name="paymenttype" class="form-control">
                                            <option value="0" {{(($userdetail != null && $userdetail[0]->active == 0)?'selected':'')}} >No</option>
                                            <option value="1" {{(($userdetail != null && $userdetail[0]->active == 1)?'selected':'')}} >Yes</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </fieldset>
                </form>
            </div>
            
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="saveAddEditUser({{(($userdetail != null)?$userdetail[0]->id:0)}})" >Save & Close</button>
        </div>
    </div>
    
</div>


