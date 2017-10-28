<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Management - {{($page == "userlist")? "Users List":""}}<small></small></h2>
                
                
                <div class=text-right>
                    
                    <a id="btn-add-user" class="btn btn-info" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus" aria-hidden="true"> Add User</i></a>
                </div>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="javascript:void(0);" class="userinfo link" >{{$user->id}}</a>
                                &nbsp;
                                <img class="propic" src="uploads/{{(($user->attachments != null)?$user->attachments:'user.jpg')}}" style="with: 24px; height: 24px;" >
                            </td>
                            <th>{{$user->first_name}}</th>
                            <th>{{$user->last_name}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{(($user->user_type == 0)?'Nomal User':'Admin')}}</th>
                            <th>{{(($user->active == 0)?'No':'Yes')}}</th>
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


