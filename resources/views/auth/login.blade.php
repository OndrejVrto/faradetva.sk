@extends('adminlte::auth.login')

@section('css')
    <link @nonce rel="stylesheet" href="{{ asset(mix('asset/admin-app.css'), true) }}">
@stop

@section('js')
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/admin-app.js'), true) }}"></script>
@stop
