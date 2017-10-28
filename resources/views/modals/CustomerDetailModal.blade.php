<!-- Modal -->
<div class="modal-dialog" style='width: 70%'>
    
    <input id="tokenaddcustomer" type="hidden" name="token" value="{{ csrf_token() }}" />
    <input id="hiddencustomerid" type="hidden" name="token" value="{{(($customerdetail != null)?$customerdetail[0]->id:'')}}" />
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2>Customer Details</h2>
        </div>
        
        <div class="modal-body">
            
            <div class="">
                <form class="form-horizontal" role="form">
                    <fieldset>
                        <div id="customer_detail_form" class="col-sm-12">
                            
                            <div class="col-sm-4">
                                <img id="imgUser" src="uploads/{{(($customerdetail != null && $customerdetail[0]->attachments != null)?$customerdetail[0]->attachments:'user.jpg')}}" style="with: 100%; height: 270px;" >
                                <input id="inpImage" type="file" name="image" accept="image/*" />
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    
                                    <label class="col-sm-12 form-label" for="textinput">First Name</label>
                                    <div class="col-sm-12">
                                        <input id="txtFirstName" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->first_name:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Job Title</label>
                                    <div class="col-sm-12">
                                        <input id="txtJobTitle" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->job_title:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">E-mail</label>
                                    <div class="col-sm-12">
                                        <input id="txtEmail" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->email_address:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Business Phone</label>
                                    <div class="col-sm-12">
                                        <input id="txtBPhone" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->business_phone:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Home Phone</label>
                                    <div class="col-sm-12">
                                        <input id="txtHPhone" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->home_phone:'')}}" >
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Last Name</label>
                                    <div class="col-sm-12">
                                        <input id="txtLastName" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->last_name:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Company</label>
                                    <div class="col-sm-12">
                                        <input id="txtCompany" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->company:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Web Page</label>
                                    <div class="col-sm-12">
                                        <input id="txtWebPage" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->web_page:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Fax</label>
                                    <div class="col-sm-12">
                                        <input id="txtFax" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->fax_number:'')}}" >
                                    </div>
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Mobile Phone</label>
                                    <div class="col-sm-12">
                                        <input id="txtMPhone" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->mobile_phone:'')}}" >
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Address</label>
                                    <div class="col-sm-12">
                                        <input id="txtAddress" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->address:'')}}" >
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    
                                    <div class="col-sm-3">
                                        <label class="col-sm-12 form-label" for="textinput">City</label>
                                        <div class="col-sm-12">
                                            <input id="txtCity" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->city:'')}}" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label class="col-sm-12 form-label" for="textinput">State/Province</label>
                                        <div class="col-sm-12">
                                            <input id="txtState" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->state:'')}}" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label class="col-sm-12 form-label" for="textinput">Zip/Postal Code</label>
                                        <div class="col-sm-12">
                                            <input id="txtZip" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->zip:'')}}" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label class="col-sm-12 form-label" for="textinput">Country/Region</label>
                                        <div class="col-sm-12">
                                            <input id="txtCountry" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->country:'')}}" >
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    
                                    <label class="col-sm-12 form-label" for="textinput">Notes</label>
                                    <div class="col-sm-12">
                                        <input id="txtNotes" class="form-control" type="text" value="{{(($customerdetail != null)?$customerdetail[0]->notes:'')}}" >
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </fieldset>
                </form>
            </div>
            
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="saveAddEditCustomer({{(($customerdetail != null)?$customerdetail[0]->id:0)}})" >Save & Close</button>
        </div>
    </div>
    
</div>


