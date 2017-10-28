<p></p>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Active Orders <small></small></h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<!--                            <table id="datatable-responsive" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">-->
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Order Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Sales Person</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" > Customer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Customer</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Sub Total</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Order Total</th>
                                    </tr>
                                </thead>
                                
                                
                                <tbody>
                                    @foreach($activeOrders as $index => $order)
                                    <tr role="row" class="@if($index%2) {{'even'}} @else {{'odd'}} @endif">
                                        <td class="sorting_1">
                                            <a href="javascript:void(0);" class="customerorderinfo link" data-toggle="modal" data-target="#newCustomerOrder" >{{$order->id}}</a>
                                        </td>
                                        <td>{{date('Y/m/d',strtotime($order->order_date))}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->customer_name}}</td>
                                        <td>{{$order->company}}</td>
                                        <td>{{$order->currency_sign}}{{$order->order_sub_total*$order->currency_value}}</td>
                                        <td>{{$order->currency_sign}}{{$order->order_total*$order->currency_value}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inventory To Re-Orders <small></small></h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    
                    
                    <div class="row">
                        <div class="col-sm-12">
                                                        <table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<!--                            <table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="text-align: center" role="grid" aria-describedby="datatable_info">-->
                                <thead >
                                    <tr role="row" class="" >
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Available</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Current Level</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" > Target Level</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Below Target</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Restock</th>
                                        
                                    </tr>
                                </thead>
                                
                                
                                <tbody>
                                    @foreach($inventoryReorder as $inventory)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <a href="javascript:void(0);" class="productinfo link" productid="{{$inventory->product_id}}" >{{$inventory->id}}</a>
                                        </td>
                                        <td>{{$inventory->product_name}}</td>
                                        <td>{{$inventory->available}}</td>
                                        <td>{{$inventory->current_level}}</td>
                                        <td>{{$inventory->target_level}}</td>
                                        <td>{{$inventory->below_target_level}}</td>
                                        <td><a href="javascript:void(0);" class="restockinfo link" data-toggle="modal" data-target="#newPurchaseOrder" productid="{{$inventory->product_id}}" >Restock</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    
    $(document).ready(function() {
        $('#datatable-responsive2').DataTable({paging: true});
    });
</script>

