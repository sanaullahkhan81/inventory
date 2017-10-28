<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Suppliers<small></small></h2>
                
                
                <div class=text-right>
                    <a id="btn-add-supplier" class="btn btn-info" data-toggle="modal" data-target="#supplierDetail"><i class="fa fa-plus" aria-hidden="true"> Add Supplier</i></a>
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
                            <th>Company</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Job Title</th>
                            <th>Business Phone</th>
                            <th>Home Phone</th>
                            <th>Mobile Phone</th>
                            <th>Fax Number</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State/Province</th>
                            <th>Zip/Postal Code</th>
                            <th>Country/Region</th>
                            <th>Web Page</th>
                            <th>Notes</th>
                            <th>Attachments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suppliers as $supplier)
                        <tr>
                            <td><a href="javascript:void(0);" class="supplierinfo link" >{{$supplier->id}}</a></td>
                            <td>{{$supplier->company}}</td>
                            <td>{{$supplier->first_name}}</td>
                            <td>{{$supplier->last_name}}</td>
                            <td>{{$supplier->email_address}}</td>
                            <td>{{$supplier->job_title}}</td>
                            <td>{{$supplier->business_phone}}</td>
                            <td>{{$supplier->home_phone}}</td>
                            <td>{{$supplier->mobile_phone}}</td>
                            <td>{{$supplier->fax_number}}</td>
                            <td>{{$supplier->address}}</td>
                            <td>{{$supplier->city}}</td>
                            <td>{{$supplier->state}}</td>
                            <td>{{$supplier->zip}}</td>
                            <td>{{$supplier->country}}</td>
                            <td>{{$supplier->web_page}}</td>
                            <td>{{$supplier->notes}}</td>
                            <td></td>
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
