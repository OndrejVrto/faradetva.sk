
@section('title', 'Error 404')
@section('description', 'Je nám ľúto. Požadovaná stránka neexistuje.')
@section('keywords', 'Stránka neexistuje, 404, chyba')

<x-frontend.layout.general>

    <x-slot name="css_general">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/custom.css') }}">
    </x-slot>

    <!-- ERROR 404 Start -->
    <div class="container d-flex min-vh-100">
        <div class="row w-100 justify-content-center align-self-center">
            <div class="col-md-6 p-5 p-lg-0 my-auto">
                <img src="{{ URL::asset('images/errors/404-error-with-a-brokenrobot-amico.svg') }}" class="w-100" alt="Detektív s lupou hľadá chybu na stránke.">
            </div>
            <div class="col-md-6 my-auto pb-5 pb-lg-0 text-center">
                <h1 class="display-1">404</h1>
                <h4>Vyzerá to tak, že táto stránka chýba.</h4>
                <p class="h5">Nebojte sa, náš najlepší robot <br> na tom už pracuje.</p>
                <p class="pt-4">Medzitým skúste ísť</p>
                <a class="btn btn-outline-secondary" href="{{ route('home') }}" role="button">Domov</a>
            </div>
        </div>
    </div>
    <!-- ERROR 404 End -->

</x-frontend.layout.general>
