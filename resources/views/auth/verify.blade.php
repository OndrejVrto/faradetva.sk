@extends('adminlte::auth.verify')

@section('css')
    <link @nonce rel="stylesheet" href="{{ mix('asset/backend/css/admin_custom.css') }}">
@stop

@section('js')
    <script @nonce type="text/javascript" src="{{ mix('asset/backend/js/admin_custom.js') }}"></script>
@stop
