<div class="row">
    
    <input id="tokenreportcenter" type="hidden" name="token" value="{{ csrf_token() }}" />
    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Reports Center</h2>
                    
                <div class=text-right>
                    <!--<a id="btn-add-order" class="btn btn-info" ><i class="fa fa-plus" aria-hidden="true"> View Report</i></a>
                    <a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"> Add Purchase Order</i></a>-->
                </div>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <div class="col-sm-12 bbLight">
                    <div class="col-sm-12">
                        <h2>Customers List</h2>
                    </div>
                        
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    
                                    <label class="col-sm-2 control-label" for="textinput">Customer</label>
                                    <div class="col-sm-3">
                                        <select id="drpCustomer" name="customer" class="form-control">
                                            <option value="0">All Customers</option>
                                            @foreach($customers as $customer)
                                            <option value="{{$customer->id}}" >{{$customer->customer_name." (".$customer->company.")"}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-5">
                                        
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        <button id="btnCustomersList" type="button" class="pull-right btn btn-success" >View Report</button>
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
                    
                <div class="col-sm-12 bbLight">
                    <div class="col-sm-12">
                        <h2>Suppliers List</h2>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    
                                    <label class="col-sm-2 control-label" for="textinput">Suppliers</label>
                                    <div class="col-sm-3">
                                        <select id="drpSupplier" name="supplier" class="form-control">
                                            <option value="0">All Suppliers</option>
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}" >{{$supplier->company}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-5">
                                        
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        <button id="btnSuppliersList" type="button" class="pull-right btn btn-success" >View Report</button>
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
                    
                <div class="col-sm-12 bbLight">
                    <div class="col-sm-12">
                        <h2>Active Ordres</h2>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    
                                    <label class="col-sm-2 control-label" for="textinput">Start Date</label>
                                    <div class="col-sm-3">
                                        <input id="txtStartDate" class="form-control datepicker" type="text" value="{{(@date('m/d/Y'))}}" >
                                    </div>
                                        
                                    <label class="col-sm-2 control-label" for="textinput">End Date</label>
                                    <div class="col-sm-3">
                                        <input id="txtEndDate" class="form-control datepicker" type="text" value="{{(@date('m/d/Y'))}}" >
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        <button id="btnActiveOrders" type="button" class="pull-right btn btn-success" >View Report</button>
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
                    
                <div class="col-sm-12 bbLight">
                    <div class="col-sm-12">
                        <h2>Yearly Sales</h2>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    
                                    <label class="col-sm-2 control-label" for="textinput">Select Year</label>
                                    <div class="col-sm-3">
                                        <select id="drpYearYearly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                            @foreach($saleYears as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        
                                    <label class="col-sm-2 control-label" for="textinput">Group Sales By</label>
                                    <div class="col-sm-3">
                                        <select id="drpGroupByYearly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                            <option value="1">Category</option>
                                            <option value="2">Country</option>
                                            <option value="3">Customer</option>
                                            <option value="4">Employee</option>
                                            <option value="5">Product</option>
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                    <div class="col-sm-5">
                                        
                                    </div>
                                        
                                    <label class="col-sm-2 control-label" for="textinput">Filter...</label>
                                    <div class="col-sm-3">
                                        <select id="drpFilterYearly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        <button id="btnYearlySales" type="button" class="pull-right btn btn-success" >View Report</button>
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
                    
                <div class="col-sm-12 bbLight">
                    <div class="col-sm-12">
                        <h2>Quarterly Sales</h2>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    
                                    <label class="col-sm-2 control-label" for="textinput">Select Year</label>
                                    <div class="col-sm-3">
                                        <select id="drpYearQuarterly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                            @foreach($saleYears as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        
                                    <label class="col-sm-2 control-label" for="textinput">Group Sales By</label>
                                    <div class="col-sm-3">
                                        <select id="drpGroupByQuarterly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                            <option value="1">Category</option>
                                            <option value="2">Country</option>
                                            <option value="3">Customer</option>
                                            <option value="4">Employee</option>
                                            <option value="5">Product</option>
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                    <label class="col-sm-2 control-label" for="textinput">Quarter</label>
                                    <div class="col-sm-3">
                                        <select id="drpQuarter" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                        
                                    <label class="col-sm-2 control-label" for="textinput">Filter...</label>
                                    <div class="col-sm-3">
                                        <select id="drpFilterQuarterly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        <button id="btnQuarterlySales" type="button" class="pull-right btn btn-success" >View Report</button>
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
                    
                <div class="col-sm-12 bbLight">
                    <div class="col-sm-12">
                        <h2>Monthly Sales</h2>
                    </div>
                    <div class="col-sm-12">
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    
                                    <label class="col-sm-2 control-label" for="textinput">Select Year</label>
                                    <div class="col-sm-3">
                                        <select id="drpYearMonthly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                            @foreach($saleYears as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        
                                    <label class="col-sm-2 control-label" for="textinput">Group Sales By</label>
                                    <div class="col-sm-3">
                                        <select id="drpGroupByMonthly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                            <option value="1">Category</option>
                                            <option value="2">Country</option>
                                            <option value="3">Customer</option>
                                            <option value="4">Employee</option>
                                            <option value="5">Product</option>
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                    <label class="col-sm-2 control-label" for="textinput">Month</label>
                                    <div class="col-sm-3">
                                        <select id="drpMonth" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                        
                                    <label class="col-sm-2 control-label" for="textinput">Filter...</label>
                                    <div class="col-sm-3">
                                        <select id="drpFilterMonthly" name="customer" class="form-control">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                        
                                    <div class="col-sm-2">
                                        <button id="btnMonthlySales" type="button" class="pull-right btn btn-success" >View Report</button>
                                    </div>
                                </div>
                                    
                            </fieldset>
                        </form>
                    </div>
                </div>
                    
                <div class="col-sm-12">
                    <br />
                </div>
                
            </div>
        </div>
    </div>
</div>
    
<script type="text/javascript" src="{!! asset('assets/js/datepicker/daterangepicker.js') !!}"></script>
<script>
    $().ready(function(){
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        }); 
    });
</script>
<style>
    .daterangepicker{
        z-index: 99999 !important;
    }
</style>