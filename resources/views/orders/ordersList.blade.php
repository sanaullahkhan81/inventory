<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Orders Management - {{(($page == 'orders')?'Orders List':(($page == 'needinvoicing')?'Need Invoicing':(($page == 'readytoship')?'Ready To Ship':(($page == 'awaitingpayment')?'Awaiting Payment':'Completed Orders'))))}}</h2>
                
                <div class=text-right>
                    <a id="btn-add-order" class="btn btn-info" data-toggle="modal" data-target="#newCustomerOrder"><i class="fa fa-plus" aria-hidden="true"> Add Order</i></a>
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
                            <th>Order Date</th>
                            <th>Employee</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Shipped Date</th>
                            <th>Payment Date</th>
                            <th>Shipping Fee</th>
                            <th>Taxes</th>
                            <th>Order Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderslist as $order)
                        <tr>
                            <td><a href="javascript:void(0);" class="customerorderinfo link" data-toggle="modal" data-target="#newCustomerOrder" >{{$order->id}}</a></td>
                            <td>{{date('m/d/Y',strtotime($order->order_date))}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->customer_name}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{date('m/d/Y',strtotime($order->shipped_date))}}</td>
                            <td>{{date('m/d/Y',strtotime($order->payment_date))}}</td>
                            <td>{{$order->currency_sign}}{{$order->shipping_fee}}</td>
                            <td>{{$order->currency_sign}}{{$order->tax*$order->currency_value}}</td>
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
