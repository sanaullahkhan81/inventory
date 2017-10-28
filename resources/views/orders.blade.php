@extends('layouts.app')

@section('content')

@include('dashboard.models')
@include('modals.modals')

@if($page == 'orders' || $page == 'needinvoicing' || $page == 'readytoship' || $page == 'awaitingpayment' || $page == 'completedorders')
    @include('orders.ordersList')
@elseif($page == 'ordercustomers')
    @include('customer.customers')
@elseif($page == 'ordershippers')
    @include('shipper.shippers')
@endif

<script type="text/javascript" src="{!! asset('js/dashboard.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/advanced.js') !!}"></script>

@endsection
