@extends('layouts.app')

@section('content')

@include('modals.modals')

@if($page == 'products' || $page == 'discontinued')
    @include('product.mainProduct')
    @include('product.modals')
@elseif($page == 'inventorylevels' || $page == 'needsrestocking')
    @include('product.inventoryLevels')
    @include('product.modals')
    
    @include('dashboard.models')
    <script type="text/javascript" src="{!! asset('js/dashboard.js') !!}"></script>
@elseif($page == 'productcategory')
    @include('product.productCategories')
@elseif($page == 'productsuppliers')
    @include('supplier.suppliers')
@endif

<script type="text/javascript" src="{!! asset('js/products.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/advanced.js') !!}"></script>

@endsection
