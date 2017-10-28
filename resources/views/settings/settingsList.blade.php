<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        
        <input id="tokensettings" type="hidden" name="token" value="{{ csrf_token() }}" />
        
        <div class="x_panel">
            <div class="x_title">
                <h2>Settings<small></small></h2>
                
                
                <div class=text-right>
<!--                    <a id="btn-add-user" class="btn btn-info" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus" aria-hidden="true"> Add User</i></a>-->
                </div>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <div class="col-sm-12 bbLight">
                    <div class="col-sm-12">
                        <h2>Bill To</h2>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    
                                    <label class="col-sm-1 control-label" for="textinput">Address</label>
                                    <div class="col-sm-5">
                                        <input id="txtBillAddress" class="form-control" type="text" value="{{(($setting != null)?$setting->bill_address:'')}}" >
                                    </div>
                                        
                                    <label class="col-sm-1 control-label" for="textinput">City</label>
                                    <div class="col-sm-2">
                                        <input id="txtBillCity" class="form-control" type="text" value="{{(($setting != null)?$setting->bill_city:'')}}" >
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <label class="col-sm-1 control-label" for="textinput">State</label>
                                    <div class="col-sm-2">
                                        <input id="txtBillState" class="form-control" type="text" value="{{(($setting != null)?$setting->bill_state:'')}}" >
                                    </div>
                                        
                                    <label class="col-sm-1 control-label" for="textinput">Zip</label>
                                    <div class="col-sm-2">
                                        <input id="txtBillZip" class="form-control" type="text" value="{{(($setting != null)?$setting->bill_zip:'')}}" >
                                    </div>
                                        
                                    <label class="col-sm-1 control-label" for="textinput">Country</label>
                                    <div class="col-sm-2">
                                        <input id="txtBillCountry" class="form-control" type="text" value="{{(($setting != null)?$setting->bill_country:'')}}" >
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        
                                    </div>
                                    
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
                
                <div class="col-sm-12 bbLight">
                    <div class="col-sm-12">
                        <h2>Ship To</h2>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    
                                    <label class="col-sm-1 control-label" for="textinput">Address</label>
                                    <div class="col-sm-5">
                                        <input id="txtShipAddress" class="form-control" type="text" value="{{(($setting != null)?$setting->ship_address:'')}}" >
                                    </div>
                                        
                                    <label class="col-sm-1 control-label" for="textinput">City</label>
                                    <div class="col-sm-2">
                                        <input id="txtShipCity" class="form-control" type="text" value="{{(($setting != null)?$setting->ship_city:'')}}" >
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <label class="col-sm-1 control-label" for="textinput">State</label>
                                    <div class="col-sm-2">
                                        <input id="txtShipState" class="form-control" type="text" value="{{(($setting != null)?$setting->ship_state:'')}}" >
                                    </div>
                                        
                                    <label class="col-sm-1 control-label" for="textinput">Zip</label>
                                    <div class="col-sm-2">
                                        <input id="txtShipZip" class="form-control" type="text" value="{{(($setting != null)?$setting->ship_zip:'')}}" >
                                    </div>
                                        
                                    <label class="col-sm-1 control-label" for="textinput">Country</label>
                                    <div class="col-sm-2">
                                        <input id="txtShipCountry" class="form-control" type="text" value="{{(($setting != null)?$setting->ship_country:'')}}" >
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        
                                    </div>
                                    
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    
                    <div class="col-sm-12">
                        <h2></h2>
                    </div>
                    
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                        
                                    <div class="col-sm-9">
                                        <label id="lblMessage" class="pull-right" style="color:greenyellow; display: none;" >Settings Successfully Saved..!</label>
                                    </div>
                                        
                                    <div class="col-sm-3">
                                        <button id="btnSaveSettings" type="button" class="pull-right btn btn-success" >Save Settings</button>
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    
    $(document).ready(function() {
        $('#datatable-responsive').DataTable({paging: true});
    });
</script>


