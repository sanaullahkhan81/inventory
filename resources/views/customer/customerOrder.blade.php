<!-- Modal -->
<div class="modal-dialog" style='width: 70%'>
    
    <input id="tokenaddorder" type="hidden" name="token" value="{{ csrf_token() }}" />
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="checkForReload()" >&times;</button>
            <h2>Order # <span class="spnOrderId">{{(($orderInfo != null)?$orderInfo[0]->id:'(New)')}}</span> 
                <span style="color:red" class="pull-right"> Status : <span class="spnOrderStatus">{{(($orderInfo != null)?$orderInfo[0]->status:'New')}}</span></span></h2>
        </div>
        <div class="modal-body">
            
            
            <button id="btnInvoiceOrder" type="button" class="btn btn-default" onclick="saveAddEditCustomerOrder(10,'')" >{{($orderInfo != null && $orderInfo[0]->invoiced == 1)?'View Invoice':'Invoice Order'}}</button>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            <button type="button" class="btn btn-primary" onclick="saveAddEditCustomerOrder(20,'')" {{(($orderInfo == null)? 'disabled':($orderInfo[0]->status_id != 10)?'disabled':'')}} >Ship Order</button>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            <button type="button" class="btn btn-success" onclick="saveAddEditCustomerOrder(30,'')" {{(($orderInfo == null)? 'disabled':($orderInfo[0]->status_id != 20)?'disabled':'')}} >Mark as Completed</button>           
            
            <button type="button" class="btn btn-default pull-right" onclick="saveAddEditCustomerOrder({{(($orderInfo != null)?$orderInfo[0]->status_id:0)}},'close')" >Save & Close</button>
            <button type="button" class="btn btn-danger pull-right" onclick="cancelCustomerOrder()" {{(($orderInfo == null)? 'disabled':($orderInfo[0]->status_id != 10)?'disabled':'')}} >Cancel Order</button>
            
            <hr>
            
            <form class="form-horizontal" role="form">
                <fieldset>
                    
                    <!-- Form Name -->
                    
                    
                    <!-- Text input-->
                    <!-- Text input-->
                    <div class="form-group">
                        
                        <label class="col-sm-2 control-label" for="textinput">Customer</label>
                        <div class="col-sm-4">
                            <select id="drpCustomer" name="customer" class="form-control" {{($orderInfo != null && ($orderInfo[0]->invoiced == 1))?'disabled':''}} >
                                <option value="0">Please Select</option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}" {{(($orderInfo != null && $orderInfo[0]->customer_id == $customer->id)?'selected':'')}} >{{$customer->customer_name." (".$customer->company.")"}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        
                        
                        <label class="col-sm-2 control-label" for="textinput">Sales Person</label>
                        <div class="col-sm-4">
                            <input id="txtSalePerson" class="form-control" type="text" disabled
                                   userid="{{(($orderInfo != null)?$orderInfo[0]->employee_id:Auth::user()->id)}}" 
                                   value="{{(($orderInfo != null)?$orderInfo[0]->name:Auth::user()->name)}}" >
                        </div>
                        
                    </div>
                    
                </fieldset>
            </form>
            
            
            <div id="maincontentdiv" class="x_content">
                
                
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Order Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Shipping Information</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Payment Information</a>
                        </li>
                    </ul>
                    
                    <div id="myTabContent" class="tab-content">
                        
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <p></p>
                            @include('customer.orderDetails')
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            
                            <form class="form-horizontal" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        
                                        <label class="col-sm-1 control-label" for="textinput">Ship Via</label>
                                        <div class="col-sm-3">
                                            <select id="drpShipVia" name="shipvia" class="form-control">
                                                <option value="0">Please Select</option>
                                                @foreach($shippers as $shipper)
                                                <option value="{{$shipper->id}}" {{(($orderInfo != null && $orderInfo[0]->ship_via == $shipper->id)?'selected':'')}} >{{$shipper->company}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                        
                                        <label class="col-sm-2 control-label" for="textinput">Ship Date</label>
                                        <div class="col-sm-2">
                                            <input id="txtShipDate" class="form-control datepicker" type="text" name="shipdate" value="{{(($orderInfo != null)? date('m/d/Y', strtotime($orderInfo[0]->shipped_date)):@date('m/d/Y'))}}">
                                        </div>
                                        <label class="col-sm-2 control-label" for="textinput">Shipping Fee</label>
                                        <div class="col-sm-2">
                                            <input id="txtShippingFee" class="form-control field-amount" type="text" name="shipfee" value="{{(($orderInfo != null)?$orderInfo[0]->shipping_fee:'0.00')}}">
                                        </div>
                                        
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="form-group">
                                        
                                        <label class="col-sm-2 control-label" for="textinput">Ship Name</label>
                                        <div class="col-sm-10" style="margin-bottom:5px;">
                                            <input id="txtShipName" class="form-control" type="text"  value="{{(($orderInfo != null)?$orderInfo[0]->ship_name:'')}}">
                                        </div> 
                                        
                                        <label class="col-sm-2 control-label" for="textinput">Address</label>
                                        <div class="col-sm-10" style="margin-bottom:5px;">
                                            <input id="txtAddress" class="form-control" type="text"  value="{{(($orderInfo != null)?$orderInfo[0]->ship_address:'')}}">
                                        </div>
                                        
                                        <label class="col-sm-2 control-label" for="textinput">City</label>
                                        <div class="col-sm-10" style="margin-bottom:5px;">
                                            <input id="txtCity" class="form-control" type="text"  value="{{(($orderInfo != null)?$orderInfo[0]->ship_city:'')}}">
                                        </div>
                                        
                                        <label class="col-sm-2 control-label" for="textinput">State/Province</label>
                                        <div class="col-sm-10" style="margin-bottom:5px;">
                                            <input id="txtState" class="form-control" type="text"  value="{{(($orderInfo != null)?$orderInfo[0]->ship_state:'')}}">
                                        </div>
                                        
                                        <label class="col-sm-2 control-label" for="textinput">Zip/Postal Code</label>
                                        <div class="col-sm-10" style="margin-bottom:5px;">
                                            <input id="txtZip" class="form-control" type="text"  value="{{(($orderInfo != null)?$orderInfo[0]->ship_zip:'')}}">
                                        </div>
                                        
                                        <label class="col-sm-2 control-label" for="textinput">Country/Region</label>
                                        <div class="col-sm-10" style="margin-bottom:5px;">
                                            <input id="txtCountry" class="form-control" type="text"  value="{{(($orderInfo != null)?$orderInfo[0]->ship_country:'')}}">
                                        </div>
                                    </div>
                                    
                                    <button type="button" class="btn btn-default" onclick="onClearAddress()" >Clear Address</button>
                                    
                                </fieldset>
                            </form>
                            
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            
                            <form class="form-horizontal" role="form">
                                <fieldset>
                                    
                                    <div class="form-group">
                                        
                                        <label class="col-sm-3 control-label" for="textinput">Order Date</label>
                                        <div class="col-sm-9" style="margin-bottom:5px;">
                                            <input id="txtOrderDate" class="form-control datepicker" type="text" disabled value="{{(($orderInfo != null)? date('m/d/Y', strtotime($orderInfo[0]->order_date)):@date('m/d/Y'))}}">
                                        </div>
                                        
                                        <label class="col-sm-3 control-label" for="textinput">Payment Type</label>
                                        <div class="col-sm-9" style="margin-bottom:5px;">
                                            <select id="drpPaymentType" name="paymenttype" class="form-control">
                                                <option value="0">Please Select</option>
                                                <option value="1" {{(($orderInfo != null && $orderInfo[0]->payment_type == 1)?'selected':'')}} >Credit Card</option>
                                                <option value="2" {{(($orderInfo != null && $orderInfo[0]->payment_type == 2)?'selected':'')}} >Cheque</option>
                                                <option value="3" {{(($orderInfo != null && $orderInfo[0]->payment_type == 3)?'selected':'')}} >Cash</option>
                                            </select>
                                        </div>
                                        
                                        <label class="col-sm-3 control-label" for="textinput">Payment Date</label>
                                        <div class="col-sm-9" style="margin-bottom:5px;">
                                            <input id="txtPaymentDate" class="form-control datepicker" type="text"  value="{{(($orderInfo != null && $orderInfo[0]->payment_date != null)? date('m/d/Y', strtotime($orderInfo[0]->payment_date)):@date('m/d/Y'))}}">
                                        </div>
                                        
                                        <label class="col-sm-3 control-label" for="textinput">Tax Rate</label>
                                        <div class="col-sm-9" style="margin-bottom:5px;">
                                            <input id="txtTaxRate" class="form-control field-percent" type="text" name="zip" value="{{(($orderInfo != null)?$orderInfo[0]->tax_rate:'0.0')}}%">
                                        </div>
                                        
                                        <label class="col-sm-3 control-label" for="textinput">Payment/Order Notes</label>
                                        <div class="col-sm-9" style="margin-bottom:5px;">
                                            <textarea id="txtNotes" class="form-control" rows="5" >{{(($orderInfo != null)?$orderInfo[0]->notes:'')}}</textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </fieldset>
                            </form>
                            
                        </div>
                        
                    </div>
                </div>
                
                
                <table class="col-md-4 pull-right" cellpadding="15">
                    <tr class="">
                        <td class="">Sub Total:</td>
                        <td class="pull-right" id="lblSubTotal">{{(($orderInfo != null)?$orderInfo[0]->order_sub_total*$orderInfo[0]->currency_value:'0.00')}}</td>
                        
                    </tr>
                    <tr>
                        <td class="">Freight:</td>
                        <td class="pull-right" id="lblFreight">{{(($orderInfo != null)?$orderInfo[0]->shipping_fee:'0.00')}}</td>
                        
                    </tr>
                    <tr>
                        <td class="c">Tax:</td>
                        <td class="pull-right" id="lblTax">{{(($orderInfo != null)?$orderInfo[0]->tax*$orderInfo[0]->currency_value:'0.00')}}</td>
                        
                    </tr>
                    <tr class="border_top">
                        <td class="" style="color: blue;font-weight: bold">Order Total:</td>
                        <td class="pull-right" id="lblOrderTotal">{{(($orderInfo != null)?$orderInfo[0]->order_total*$orderInfo[0]->currency_value:'0.00')}}</td>
                        
                    </tr>
                </table>
                
            </div>
            
        </div>
        <div class="modal-footer">
<!--            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Order</button>-->
            <!--        <button type="button" class="btn btn-default" >Update</button>-->
        </div>
    </div>
    
</div>

<script type="text/javascript">

    /*$('#sandbox-container .input-group.date').datepicker({
    todayBtn: "linked"
});*/
</script>


<script type="text/javascript" src="{!! asset('assets/js/datepicker/daterangepicker.js') !!}"></script>
<script>
    $().ready(function(){
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        }); 
    });
</script>
<style>
    .daterangepicker{
        z-index: 99999 !important;
    }
</style>

