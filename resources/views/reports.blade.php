@extends('layouts.app')

@section('content')

@include('reports.reportsList')

<script type="text/javascript" src="{!! asset('js/reports.js') !!}"></script>

@endsection