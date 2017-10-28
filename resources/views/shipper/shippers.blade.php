<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Shippers<small></small></h2>
                
                
                <div class=text-right>
                    <a id="btn-add-shipper" class="btn btn-info" data-toggle="modal" data-target="#shipperDetail"><i class="fa fa-plus" aria-hidden="true"> Add Shipper</i></a>
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
                        @foreach($shippers as $shipper)
                        <tr>
                            <td><a href="#" class="shipperinfo" >{{$shipper->id}}</a></td>
                            <td>{{$shipper->company}}</td>
                            <td>{{$shipper->first_name}}</td>
                            <td>{{$shipper->last_name}}</td>
                            <td>{{$shipper->email_address}}</td>
                            <td>{{$shipper->job_title}}</td>
                            <td>{{$shipper->business_phone}}</td>
                            <td>{{$shipper->home_phone}}</td>
                            <td>{{$shipper->mobile_phone}}</td>
                            <td>{{$shipper->fax_number}}</td>
                            <td>{{$shipper->address}}</td>
                            <td>{{$shipper->city}}</td>
                            <td>{{$shipper->state}}</td>
                            <td>{{$shipper->zip}}</td>
                            <td>{{$shipper->country}}</td>
                            <td>{{$shipper->web_page}}</td>
                            <td>{{$shipper->notes}}</td>
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
