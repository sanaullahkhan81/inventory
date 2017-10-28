@extends('layouts.app')

@section('content')

@include('dashboard.activeOrders')
@include('dashboard.models')
@include('product.modals')

<script type="text/javascript" src="{!! asset('js/dashboard.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/products.js') !!}"></script>

@endsection