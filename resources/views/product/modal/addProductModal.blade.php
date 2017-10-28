<div class="modal-dialog" style='width: 70%'>
    <input id="tokenaddprodect" type="hidden" name="token" value="{{ csrf_token() }}" />
    <input id="hiddenproductid" type="hidden" name="token" value="{{(($productdetail != null)?$productdetail[0]->id:'')}}" />
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2>Product Detail</h2>
        </div>
        <div class="modal-body">
            <div class="">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_product_details" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true" onclick="tabSelected(1)" >Product Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_order_history" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false" onclick="tabSelected(2)" >Order History</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_purchase_history" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" onclick="tabSelected(3)" >Purchase History</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_inventory" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false" onclick="tabSelected(4)" >Inventory</a>
                        </li>
                    </ul>
                        
                    <div id="myTabContent" class="tab-content">
                        
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_product_details" aria-labelledby="home-tab">
                            <form class="form-horizontal form-label-left input_mask">
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name: </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtProductName" type="text" class="form-control" value="{{(($productdetail != null)?$productdetail[0]->product_name:'')}}">
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Code:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtProductCode" type="text" class="form-control" disabled placeholder="Auto Generated" value="{{(($productdetail != null)?$productdetail[0]->product_code:'')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Standard Cost:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtStandardCost" type="number" class="form-control" placeholder="" value="{{(($productdetail != null)?$productdetail[0]->standard_cost:'')}}">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select id="drpCategoryProduct" name="paymenttype" class="form-control">
                                                <option value="0">Please Select</option>
                                                @foreach($categories as $cate)
                                                <option value="{{$cate->id}}" data-catcode="{{$cate->cat_code}}" {{(($productdetail != null && $productdetail[0]->category_id == $cate->id)?'selected':'')}}>{{$cate->cat_code}} - {{$cate->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">List Price:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtListPrice" type="text" readonly class="form-control" value="{{(($productdetail != null)?$productdetail[0]->list_price:'')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select id="drpSupplierProduct" name="paymenttype" class="form-control">
                                                <option value="0">Please Select</option>
                                                @foreach($suppliers as $supp)
                                                <option value="{{$supp->id}}" data-supcode="{{$supp->sup_code}}" {{(($productdetail != null && $productdetail[0]->supplier_id == $supp->id)?'selected':'')}}>{{$supp->sup_code}} - {{$supp->first_name . " " . $supp->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtQtyPerUnit" type="text" class="form-control" value="{{(($productdetail != null)?$productdetail[0]->quantity_per_unit:'')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Manufacturer Code:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtSupCode" type="text" class="form-control" value="{{(($productdetail != null)?$productdetail[0]->sup_code:'')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Size:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtSize" type="text" class="form-control" value="{{(($productdetail != null)?$productdetail[0]->size:'')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier Item Code:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtSupItemCode" type="text" class="form-control" value="{{(($productdetail != null)?$productdetail[0]->sup_item_code:'')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Discontinued:</label>
                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                            <input id="chbDiscontinued" type="checkbox" class="form-control" style="display: {{($productdetail == null)?'none':'inline'}};" {{($productdetail != null && $productdetail[0]->discontinue==1)?'checked':''}} >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <div class="col-sm-6 form-group">
                                        <label class="control-label">Description:</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea id="txtDescription" style="width: 100%">{{(($productdetail != null)?$productdetail[0]->description:'')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="control-label">Attachments:</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <img id="imgProduct" src="uploads/{{(($productdetail != null && $productdetail[0]->attachments != null)?$productdetail[0]->attachments:'product.jpg')}}" style="with: 100%; height: 70px;" >
                                            <input id="inpFile" type="file" name="image" accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_order_history" aria-labelledby="profile-tab">
                            <p></p>
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table">
                                    <thead>
                                        <tr class="headings">
                                            
                                            <th class="column-title">Order No </th>
                                            <th class="column-title">Date </th>
                                            <th class="column-title">Customer </th>
                                            <th class="column-title">Transaction </th>
                                            <th class="column-title">Quantity </th>
                                            <th class="column-title">Status </th>
                                            </th>
                                                
                                        </tr>
                                    </thead>
                                        
                                    <tbody id="tblProdOrderHistory">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_purchase_history" aria-labelledby="profile-tab">
                            <p></p>
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table">
                                    <thead>
                                        <tr class="headings">
                                            
                                            <th class="column-title">PO No </th>
                                            <th class="column-title">Date </th>
                                            <th class="column-title">Supplier </th>
                                            <th class="column-title">Quantity </th>
                                            <th class="column-title">Unit Cost </th>
                                            <th class="column-title">Received </th>
                                            </th>
                                                
                                        </tr>
                                    </thead>
                                        
                                    <tbody id="tblProdPurchaseHistory">
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_inventory" aria-labelledby="profile-tab">
                            <p></p>
                                
                            <form class="form-horizontal form-label-left input_mask">
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label">Inventory Settings</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Initial Level:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtInitialLevel" type="text" class="form-control" value="{{(($prodinventory != null)?$prodinventory[0]->initial_level:'')}}" {{($productdetail == null)?'disabled':''}} >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Min Reorder Quantity:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtMinReorderQty" type="text" class="form-control" value="{{(($prodinventory != null)?$prodinventory[0]->min_reorder_quantity:'')}}" {{($productdetail == null)?'disabled':''}} >
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Reorder Level:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtReorderLevel" type="text" class="form-control" value="{{(($prodinventory != null)?$prodinventory[0]->reorder_level:'')}}" {{($productdetail == null)?'disabled':''}} >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Target Level:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="txtTargetLevel" type="text" class="form-control" value="{{(($prodinventory != null)?$prodinventory[0]->target_level:'')}}" {{($productdetail == null)?'disabled':''}} >
                                        </div>
                                    </div> 
                                </div>
                                    
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label">Inventory Shrinkage</label>
                                    </div>
                                    <div class=text-right>
                                        <a id="btn-add-shrinkage" class="btn btn-info" ><i class="fa fa-plus" aria-hidden="true"> Add Shrinkage</i></a>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group table-responsive">
                                    <table class="table table-striped jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                
                                                <th class="column-title">Date </th>
                                                <th class="column-title">Quantity </th>
                                                <th class="column-title">Reason </th>
                                                <th class="column-title"></th>
                                                </th>
                                                    
                                            </tr>
                                        </thead>
                                            
                                        <tbody id="shrinkagetable">
                                            
                                            @foreach($prodinventoryshrinkage as $pis)
                                            <tr class="even pointer">
                                                <td class="col-md-2">
                                                    <label class="labelfield control-label">{{date('m/d/Y', strtotime($pis->date))}}</label>
                                                    <input class="editfield form-control shrinkagedate" name="shrinkagedate[]" style="display: none;" value="{{date('m/d/Y', strtotime($pis->date))}}" />
                                                </td>
                                                <td class="col-md-2">
                                                    <label class="labelfield control-label">{{$pis->quantity}}</label>
                                                    <input class="editfield form-control shrinkagequantity" name="shrinkagequantity[]" style="display: none;" value="{{$pis->quantity}}" />
                                                </td>
                                                <td class="col-md-7">
                                                    <label class="labelfield control-label">{{$pis->reason}}</label>
                                                    <input class="editfield form-control shrinkagereason" name="shrinkagereason[]" style="display: none;" value="{{$pis->reason}}" />
                                                </td>
                                                <td class="col-md-1">
                                                    <a href="javascript:void(0);" class="editshrinkage link">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                                
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label">Inventory History Total</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Received:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" >{{(($prodinventory != null)?$prodinventory[0]->received:'0')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">On Hand:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" >{{(($prodinventory != null)?$prodinventory[0]->on_hand:'0')}}</label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">On Order:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" >{{(($prodinventory != null)?$prodinventory[0]->on_order:'0')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Available:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" >{{(($prodinventory != null)?$prodinventory[0]->available:'0')}}</label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Shipped:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" >{{(($prodinventory != null)?$prodinventory[0]->shipped:'0')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Below Target Level:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" >{{(($prodinventory != null)?$prodinventory[0]->below_target_level:'0')}}</label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Back Ordered:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" >{{(($prodinventory != null)?$prodinventory[0]->back_ordered:'0')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Total Shrinkage:</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" >{{(($prodinventory != null)?$prodinventory[0]->shrinkage:'0')}}</label>
                                        </div>
                                    </div> 
                                </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
        <div class="modal-footer">
            <button id="btn-add-edit-product-save" type="button" class="btn btn-default"  onclick="saveAddEditProduct({{(($productdetail != null)?$productdetail[0]->id:0)}})" >Save & Close</button>
        </div>
    </div>
        
</div>
    
<script type="text/javascript" src="{!! asset('assets/js/datepicker/daterangepicker.js') !!}"></script>
<!--<script>
    $().ready(function(){
        $('.shrinkagedate').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        }); 
    });
</script>-->
<style>
    .daterangepicker{
        z-index: 99999 !important;
    }
</style>