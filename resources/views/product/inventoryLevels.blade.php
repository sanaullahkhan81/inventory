<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product Management - {{($page == "inventorylevels")? "Inventory Levels":"Needs Restocking"}}<small></small></h2>
                
                
                <div class=text-right>
                    
                    <a id="btn-add-product" class="btn btn-info" data-toggle="modal" data-target="#addProduct"><i class="fa fa-plus" aria-hidden="true"> Add Product</i></a>
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
                            <th>Product Name</th>
                            <th>On Hand</th>
                            <th>Allocated</th>
                            <th>Available</th>
                            <th>Shrinkage</th>
                            <th>On Order</th>
                            <th>Current Level</th>
                            <th>Target Level</th>
                            <th>Below Target</th>
                            <th>Purchase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventoryLevels as $invLevel)
                        <tr>
                            <td>
                                <a href="javascript:void(0);" class="productinfo link" productid="{{$invLevel->product_id}}">{{$invLevel->product_id}}</a>
                            </td>
                            <td>
                                <img class="propic" src="uploads/{{(($invLevel->attachments != null)?$invLevel->attachments:'product.jpg')}}" style="with: 24px; height: 24px;" >
                                &nbsp;
                                {{$invLevel->product_name}}
                            </td>
                            <td>{{$invLevel->on_hand}}</td>
                            <td>{{$invLevel->allocated}}</td>
                            <td>{{$invLevel->available}}</td>
                            <td><a href="javascript:void(0);" class="productinfo link" productid="{{$invLevel->product_id}}">{{$invLevel->shrinkage}}</a></td>
                            <td>{{$invLevel->on_order}}</td>
                            <td>{{$invLevel->current_level}}</td>
                            <td>{{$invLevel->target_level}}</td>
                            <td>{{$invLevel->below_target_level}}</td>
                            <td><a href="javascript:void(0);" class="purchaseinfo link" data-toggle="modal" data-target="#newPurchaseOrder" productid="{{$invLevel->product_id}}" >Purchase</a></td>
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
