{{-- @extends('_layouts.app')

@section('title', 'Dashboard')
@section('description', 'Hlavná stránka administrácie')
@section('keywords', 'Slová')
@section('mainTitle', 'Dashboard')

@section('content')

@endsection --}}




@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
