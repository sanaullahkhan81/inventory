@extends('layouts.app')

@section('content')

@if($page == 'purchases' || $page == 'awaitingapproval' || $page == 'inventoryreceiving' || $page == 'completedpurchases')
    @include('orders.purchaseOrdersList')
    @include('dashboard.models')
@elseif($page == 'purchasessuppliers')
    @include('supplier.suppliers')
    @include('modals.modals')
    <script type="text/javascript" src="{!! asset('js/advanced.js') !!}"></script>
@endif

<script type="text/javascript" src="{!! asset('js/dashboard.js') !!}"></script>

@endsection
