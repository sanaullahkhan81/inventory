@extends('layouts.app')

@section('content')

@include('modals.modals')

@if($page == 'customers')
    @include('customer.customers')
@elseif($page == 'suppliers')
    @include('supplier.suppliers')
@elseif($page == 'categories')
    @include('product.productCategories')
@elseif($page == 'shippers')
    @include('shipper.shippers')
@endif

<script type="text/javascript" src="{!! asset('js/advanced.js') !!}"></script>

@endsection
