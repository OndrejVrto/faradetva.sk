@extends('frontend._layouts.master')

@section('title', 'Error 403')
@section('description', 'Je nám ľúto. K požadovanej stránke nemáte oprávnenia.')

@section('css_master')
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom.css') }}">
@stop

@section('body')
    <div class="container d-flex min-vh-100">
        <div class="row w-100 justify-content-center align-self-center">

            <div class="col-md-6 p-5 p-lg-0 my-auto">
                <img src="{{ URL::asset('images/errors/403-error-forbidden-amico.svg') }}" class="mw-100" alt="Vrátnik stopuje pred dverami.">
            </div>
            <div class="col-md-7 col-lg-6 my-auto pb-5 pb-lg-0 text-center">
                <h1 class="display-1">403</h1>

                @auth
                <h2>Dobrý deň <span class="text-church-template">{{ Auth::user()->name }}</span></h2>
                @endauth
                <h4>
                    Vyzerá to tak, že k tejto <a class="link-secondary link-template" href="{{ URL::current() }}">stránke</a>
                    <br>
                    nemáte dostatočné oprávnenia.
                </h4>
                <p class="h5 pt-3">
                    Oslovte administrátora Ondreja
                    <br>
                    aby Vám pridelil príslušné práva.
                </p>

                <p class="pt-5">
                    <span class="pe-2">Medzitým choďťe</span>
                    <a class="btn btn-outline-secondary" href="{{ URL::previous() }}" role="button">späť</a>
                    <span class="px-2">prípadne</span>
                    <a class="btn btn-outline-secondary" href="{{ URL::previous() }}" role="button">domov</a>
                </p>

                <div class="pt-4">
                    <span class="pe-2">alebo sa</span>
                    <a class="btn btn-outline-danger" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        odhláste
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
