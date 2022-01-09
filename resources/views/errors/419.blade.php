@extends('frontend._layouts.master')

@section('title', 'Error 419')
@section('description', 'Boli ste automaticky odhlesený po dlhšej nečinnosti.')

@section('css_master')
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/responsive.css') }}">
@stop

@section('body')
    <div class="container d-flex min-vh-100">
        <div class="row w-100 justify-content-center align-self-center">
            <div class="col-md-6 p-5 p-lg-0 my-auto">
                <img src="{{ URL::asset('images/errors/419-time-management-amico.svg') }}" class="w-100" alt="Dievčatko sedí na hodinách vedľa kalendára.">
            </div>
            <div class="col-md-6 my-auto pb-5 pb-lg-0 text-center">
                <h1 class="display-1">419</h1>
                <h4>
                    Vyzerá to tak, že ste už boli odhlásený.
                    <br>
                    Asi ste boli dlhšiu dobu neaktívny.
                </h4>

                <p class="pt-2">
                    <p>
                        Skúste sa opäť
                        <a class="ms-3 btn btn-outline-warning" href="{{ route('login') }}" role="button">prihlásiť</a>
                    </p>
                    <p>
                        Prípadne choďte
                        <a class="ms-3 btn btn-outline-secondary" href="{{ route('home') }}" role="button">domov</a>
                    </p>
                </p>

            </div>
        </div>
    </div>
@endsection
