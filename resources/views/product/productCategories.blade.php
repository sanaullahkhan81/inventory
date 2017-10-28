<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Categories<small></small></h2>
                
                
                <div class=text-right>
                    <a id="btn-add-category" class="btn btn-info" data-toggle="modal" data-target="#categoryDetail"><i class="fa fa-plus" aria-hidden="true"> Add Category</i></a>
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
                            <th>Category Code</th>
                            <th>Product Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productCategories as $category)
                        <tr>
                            <td><a href="javascript:void(0);" class="categoryinfo link" >{{$category->id}}</a></td>
                            <td>{{$category->cat_code}}</td>
                            <td>{{$category->category}}</td>
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
