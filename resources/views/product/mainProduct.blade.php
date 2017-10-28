<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product Management - {{($page == "products")? "Products List":"Discontinued Products"}}<small></small></h2>
                
                
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
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Supplier Item Code</th>
                            <th>Product Description</th>
                            <th>Standard Cost</th>
                            <th>List Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productslist as $product)
                        <tr>
                            <td>
                                <a href="javascript:void(0);" class="productinfo link" productid="{{$product->id}}">{{$product->product_code}}</a>
                            </td>
                            <td>
                                <img class="propic" src="uploads/{{(($product->attachments != null)?$product->attachments:'product.jpg')}}" style="with: 24px; height: 24px;" >
                                &nbsp;
                                {{$product->product_name}}
                            </td>
                            <td>{{$product->sup_item_code}}</td>
                            <td>{{$product->description}}</td>
                            <td>SAR. {{$product->standard_cost}}</td>
                            <td>SAR. {{$product->list_price}}</td>
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
