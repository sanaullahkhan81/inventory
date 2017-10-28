<!-- Modal -->
<div class="modal-dialog" style='width: 70%'>
    
    <input id="tokenaddpurchase" type="hidden" name="token" value="{{ csrf_token() }}" />
        
    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="checkForReload()" >&times;</button>
            <h2>Purchase Order #<span class="spnOrderIdPurchase">{{(($orderInfo != null)?$orderInfo[0]->id:'(New)')}}</span> 
                <span style="color:red" class="pull-right"> Status : <span class="spnOrderStatusPurchase">{{(($orderInfo != null)?$orderInfo[0]->status:'New')}}</span></span></h2>
        </div>
          
            <div id="mainbodydiv" class="modal-body">
            
            <button type="button" class="btn btn-default" onclick="saveAddEditPurchaseOrder(10,'')" {{(($orderInfo != null && ($orderInfo[0]->submitted == 1 || $orderInfo[0]->completed == 1))? 'disabled':'' )}} >Submit Order</button>
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            <button type="button" class="btn btn-primary" onclick="saveAddEditPurchaseOrder(20,'')" {{(($orderInfo == null)? 'disabled':($orderInfo[0]->submitted != 1 || $orderInfo[0]->completed == 1)? 'disabled':'' )}} >Complete Order</button>
            
            <button type="button" class="btn btn-success pull-right" onclick="saveAddEditPurchaseOrder(-1,'close')" >Save & Close</button>
            <button id="btnCancel" type="button" class="btn btn-danger pull-right" onclick="cancelPurchaseOrder()" {{(($orderInfo == null)? 'disabled':($orderInfo[0]->submitted != 1 || $orderInfo[0]->completed == 1)? 'disabled':'' )}} >Cancel Order</button>
            
            @if($orderInfo != null && ($orderInfo[0]->submitted == 1 || $orderInfo[0]->completed == 1))
            <a href="viewPurchaseOrderInvoice/pdf?orderId={{$orderInfo[0]->id}}" target="_blank"><button type="button" class="btn btn-default pull-right">View Order Report</button></a>
            @endif
            
            <div class="ln_solid"></div>
            
            <form class="form-horizontal form-label-left input_mask">
           
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select id="drpSuppliers" name="supplier" class="form-control">
                                <option value="0">Please Select</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}" {{(($orderInfo != null && $orderInfo[0]->supplier_id == $supplier->id)?'selected':(($productInfo != null && $productInfo[0]->supplier_id == $supplier->id)?'selected':''))}} >{{$supplier->company}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                              
                </div>
                          
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Expected Date</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="txtExpectedDate" type="text" class="form-control datepicker" value="{{(($orderInfo != null)?date('m/d/Y',strtotime($orderInfo[0]->expected_date)):@date('m/d/Y'))}}" >
                        </div>
                    </div>
                            
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Created By</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="txtCreatedBy" type="text" disabled=""class="form-control" placeholder="" createdbyid="{{(($orderInfo != null)?$orderInfo[0]->created_by:Auth::user()->id)}}" value="{{(($orderInfo != null)?$orderInfo[0]->createdusername:Auth::user()->name)}}" >
                        </div>
                    </div>
                            
                </div>
                          
                          
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Created Date</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="txtCreateDate" type="text" disabled=""class="form-control" value="{{(($orderInfo != null)?date('m/d/Y',strtotime($orderInfo[0]->creation_date)):@date('m/d/Y'))}}">
                        </div>
                    </div>
                                        
                </div>
                                    
                                    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Submitted By</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="txtSubmittedBy" type="text" disabled=""class="form-control" submittedbyid="{{($orderInfo != null && $orderInfo[0]->submitted_by != null)?$orderInfo[0]->submitted_by:(Auth::user()->id)}}" value="{{(($orderInfo != null && $orderInfo[0]->submitted == 1)?$orderInfo[0]->submittedusername:'')}}">
                        </div>
                    </div>
                                        
                </div>
                                    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Submitted Date</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="txtSubmittedDate" type="text" disabled=""class="form-control" submitteddate="{{@date('m/d/Y')}}" value="{{(($orderInfo != null && $orderInfo[0]->submitted_date != null)?date('m/d/Y',strtotime($orderInfo[0]->submitted_date)):'')}}">
                        </div>
                    </div>
                                        
                </div>
                                    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Closed By</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="txtClosedBy" type="text" disabled=""class="form-control" closedbyid="{{(($orderInfo != null && $orderInfo[0]->closed_by != null)?$orderInfo[0]->closed_by:Auth::user()->id)}}" value="{{(($orderInfo != null)?$orderInfo[0]->completedusername:'')}}">
                        </div>
                    </div>
                                        
                </div>
                                    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Closed Date</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="txtClosedDate" type="text" disabled=""class="form-control" closeddate="{{@date('m/d/Y')}}" value="{{(($orderInfo != null && $orderInfo[0]->closed_date != null)?date('m/d/Y',strtotime($orderInfo[0]->closed_date)):'')}}">
                        </div>
                    </div>
                                        
                </div>
                                    
            </form>
                        
            <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#purchase_tab_content1" id="purchase-tab" role="tab" data-toggle="tab" aria-expanded="true">Purchase Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#purchase_tab_content2" role="tab" id="purchase-tab1" data-toggle="tab" aria-expanded="false">Inventory Receiving</a>
                        </li>
                        <li role="presentation" class=""><a href="#purchase_tab_content3" role="tab" id="purchase-tab2" data-toggle="tab" aria-expanded="false">Payment Information</a>
                        </li>
                    </ul>
                          
                    <div id="myTabContent" class="tab-content">
                        
                        <div role="tabpanel" class="tab-pane fade active in" id="purchase_tab_content1" aria-labelledby="home-tab">
                            <p></p>
                            @include('purchase.modal.puchaseDetails')
                        </div>
                            
                        <div role="tabpanel" class="tab-pane fade" id="purchase_tab_content2" aria-labelledby="profile-tab">
                            <p></p>
                              
                            <div class="x_content">
                              
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table">
                                        <thead>
                                            <tr class="headings">
                                       
                                                <th class="column-title"></th>
                                                <th class="column-title">Product </th>
                                                <th class="column-title">Quantity </th>
                                                <th class="column-title">Date Received </th>
                                                <th class="column-title">Post To Inventory</th>
                                         
                                            </tr>
                                        </thead>
                                     
                                        <tbody id="supplierinventoriestable" >
                                            @if($orderInfo != null && $orderInfo[0]->submitted == 1)
                                         
                                            @foreach($orderDetailInfo as $odi)
                                        <script>
                                            var invReceived = "{{ $odi->posted_to_inventory }}";
                                            if(invReceived == 1)
                                            {
                                                $('#btnCancel').prop('disabled', true);
                                            }
                                        </script>
                                             
                                            <tr class="even pointer rowSupplierProducts">
                                                <td class="col-md-1">
                                                    <img class="propic" src="uploads/{{(($odi->attachments != null)?$odi->attachments:'product.jpg')}}" style="with: 40px; height: 30px;" >
                                                </td>
                                                <td class="col-md-5">
                                                    <input  class="form-control productnameinv" type="text" disabled value="{{($supplierProducts != null && @count($supplierProducts)>0)? $supplierProducts[$odi->product_id]->product_name:''}}">
                                                </td>
                                                <td class="col-md-2">
                                                    <input  class="form-control quantityinv" disabled value="{{$odi->quantity}}">
                                                </td>
                                                <td class="col-md-2">
                                                    <input class="form-control receivedateinv datepicker" type="text" {{(($orderInfo != null && $orderInfo[0]->completed == 1)?'disabled':'')}} value="{{($odi->date_received != null)?date('m/d/Y', strtotime($odi->date_received)):''}}" />
                                                </td>
                                                <td class="col-md-2">
                                                    <input class="form-control posttoinv" type="checkbox" {{(($orderInfo != null && $orderInfo[0]->completed == 1)?'disabled':'')}} {{($odi->posted_to_inventory==1)?'checked':''}} />
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                            @endif
                                        </tbody>
                                    </table>
                                </div>				
                                 
                            </div>
                        </div>
                            
                        <div role="tabpanel" class="tab-pane fade" id="purchase_tab_content3" aria-labelledby="profile-tab">
                            <p></p>
                              
                            <form class="form-horizontal" role="form">
                                <fieldset>
                                    
                                        <div class="form-group">
                                        
                                        <label class="col-sm-3 control-label" for="textinput">Payment Type</label>
                                        <div class="col-sm-9" style="margin-bottom:5px;">
                                            <select id="drpPaymentTypePurchase" name="paymenttype" class="form-control">
                                                <option value="0">Please Select</option>
                                                <option value="1" {{(($orderInfo != null && $orderInfo[0]->payment_method == 1)?'selected':'')}} >Credit Card</option>
                                                <option value="2" {{(($orderInfo != null && $orderInfo[0]->payment_method == 2)?'selected':'')}} >Cheque</option>
                                                <option value="3" {{(($orderInfo != null && $orderInfo[0]->payment_method == 3)?'selected':'')}} >Cash</option>
                                            </select>
                                        </div>
                                            
                                        <label class="col-sm-3 control-label" for="textinput">Payment Date</label>
                                        <div class="col-sm-9" style="margin-bottom:5px;">
                                            <input id="txtPaymentDatePurchase" class="form-control datepicker" type="text" name="paymentdate" value="{{(($orderInfo != null && $orderInfo[0]->payment_date != null)?date('m/d/Y',strtotime($orderInfo[0]->payment_date)):'')}}">
                                            <!--                                             <div class="input-group date" data-provide="datepicker">
                                                                                            <input type="text" class="form-control">
                                                                                            <div class="input-group-addon">
                                                                                                <span class="glyphicon glyphicon-th"></span>
                                                                                            </div>
                                                                                        </div>-->
                                        </div>
                                            
                                        <label class="col-sm-3 control-label" for="textinput">Payment/Order Notes</label>
                                        <div class="col-sm-9" style="margin-bottom:5px;">
                                            <textarea id="txtNotesPurchase" class="form-control" rows="5" >{{(($orderInfo != null)?$orderInfo[0]->notes:'')}}</textarea>
                                        </div>
                                            
                                    </div>
                                        
                                </fieldset>
                            </form>
                                  
                        </div>
                            
                    </div>
                </div>
                <table class="col-md-4 pull-right" cellpadding="15">
                    <tr class="border_top">
                        <td class="" style="color: blue;font-weight: bold">Order Sub Total:</td>
                        <td class="pull-right" id="lblSubTotalPurchase">{{(($orderInfo != null)?$orderInfo[0]->order_sub_total*$orderInfo[0]->currency_value:'0.00')}}</td>
                        
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