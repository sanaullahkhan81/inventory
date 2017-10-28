@extends('layouts.app')

@section('content')

@include('user.usersList')
@include('user.modals')

<script type="text/javascript" src="{!! asset('js/users.js') !!}"></script>

@endsection