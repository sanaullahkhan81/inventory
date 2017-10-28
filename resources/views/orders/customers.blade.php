<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product Management<small></small></h2>
                
                
                <div class=text-right>
                    
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Job Title</th>
                            <th>Company</th>
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
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->first_name}}</td>
                            <td>{{$customer->last_name}}</td>
                            <td>{{$customer->email_address}}</td>
                            <td>{{$customer->job_title}}</td>
                            <td>{{$customer->company}}</td>
                            <td>{{$customer->business_phone}}</td>
                            <td>{{$customer->home_phone}}</td>
                            <td>{{$customer->mobile_phone}}</td>
                            <td>{{$customer->fax_number}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->city}}</td>
                            <td>{{$customer->state}}</td>
                            <td>{{$customer->zip}}</td>
                            <td>{{$customer->country}}</td>
                            <td>{{$customer->web_page}}</td>
                            <td>{{$customer->notes}}</td>
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
        $('#datatable-responsive').DataTable({"scrollX": true});
    });
</script>
