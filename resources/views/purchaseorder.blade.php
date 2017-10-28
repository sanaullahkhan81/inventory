@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Purchase Orders<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>-->
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Vendor name</th>
                  <th>Vendor address</th>
                  <th>Vendor Phone</th>
                  <th>Vendor email</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>SAR Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>Vendor Name</td>
                  <td>Address of Vendor</td>
                  <td>+123456789</td>
                  <td>email@test.com</td>
                  <td>Vendor Country</td>
                  <td>Vendor State</td>
                  <td>Vendor City</td>
                  <td>Test Name of product</td>
                  <td>125</td>
                  <td>20,000</td>
                </tr>
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
@endsection
