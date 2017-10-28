<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Purchase Management - {{(($page == "purchases")? "Orders List":(($page == "awaitingapproval")? "Awaiting Approval":(($page == "inventoryreceiving")? "Inventory Receiving":"Completed Purchases")))}}</h2>
                
                
                <div class=text-right>
                    <a id="btn-add-purchase-order" class="btn btn-info" data-toggle="modal" data-target="#newPurchaseOrder"><i class="fa fa-plus" aria-hidden="true"> Add Purchase Order</i></a>
                    <!--<a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"> Add Purchase Order</i></a>-->
                </div>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Creation Date</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Supplier</th>
                            <th>Submitted By</th>
                            <th>Payment Date</th>
                            <th>Order Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchases as $order)
                        <tr>
                            <td><a href="javascript:void(0);" class="purchaseorderinfo link" data-toggle="modal" data-target="#newPurchaseOrder">{{$order->id}}</a></td>
                            <td>{{($order->creation_date != null)?date('m/d/Y',strtotime($order->creation_date)):''}}</td>
                            <td>{{$order->createdusername}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->company}}</td>
                            <td>{{$order->submittedusername}}</td>
                            <td>{{($order->payment_date != null)?date('m/d/Y',strtotime($order->payment_date)):''}}</td>
                            <td>{{$order->currency_sign}}{{$order->order_total*$order->currency_value}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<script>
    
    
    $(document).ready(function() {
        $('#datatable-responsive').DataTable({paging: true});
    });
</script>
