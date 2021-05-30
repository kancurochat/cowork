<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicons/favicon-16x16.png')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/adminlte.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-navy shadow-sm">
            <div class="container">
                @if (Auth::check())
                <form class='form-inline d-none d-md-flex' action="{{ route('home') }}" method="GET">

                    <div class="col-12">
                        <input type="search" class="form-control " name="texto" id="texto" placeholder="Buscar..."
                            value="{{$texto ?? ''}}">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        <div class="card card-primary collapsed-card mt-2">
                            <div class="card-header bg-navy">
                                <h3 class="card-title">Servicios</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">
                                <div class="form-group d-block">
                                    <div class="form-check text-dark my-1">
                                        @if (in_array('internet', $services ?? []))
                                        <input class="form-check-input" type="checkbox" value="internet" id="internet"
                                            name="services[]" checked>
                                        <label class="form-check-label" for="internet">
                                            Internet
                                        </label>
                                        @else
                                        <input class="form-check-input" type="checkbox" value="internet" id="internet"
                                            name="services[]">
                                        <label class="form-check-label" for="internet">
                                            Internet
                                        </label>
                                        @endif
                                    </div>
                                    <div class="form-check text-dark my-1">
                                        @if (in_array('escáner', $services ?? []))
                                        <input class="form-check-input" type="checkbox" value="escáner" id="escaner"
                                            name="services[]" checked>
                                        <label class="form-check-label" for="escaner">
                                            Escáner
                                        </label>
                                        @else
                                        <input class="form-check-input" type="checkbox" value="escáner" id="escaner"
                                            name="services[]">
                                        <label class="form-check-label" for="escaner">
                                            Escáner
                                        </label>
                                        @endif
                                    </div>
                                    <div class="form-check text-dark my-1">
                                        @if (in_array('fotocopiadora', $services ?? []))
                                        <input class="form-check-input" type="checkbox" value="fotocopiadora"
                                            id="fotocopiadora" name="services[]" checked>
                                        <label class="form-check-label" for="fotocopiadora">
                                            Fotocopiadora
                                        </label>
                                        @else
                                        <input class="form-check-input" type="checkbox" value="fotocopiadora"
                                            id="fotocopiadora" name="services[]">
                                        <label class="form-check-label" for="fotocopiadora">
                                            Fotocopiadora
                                        </label>
                                        @endif
                                    </div>
                                    <div class="form-check text-dark my-1">
                                        @if (in_array('impresora', $services ?? []))
                                        <input class="form-check-input" type="checkbox" value="impresora" id="impresora"
                                            name="services[]" checked>
                                        <label class="form-check-label" for="impresora">
                                            Impresora
                                        </label>
                                        @else
                                        <input class="form-check-input" type="checkbox" value="impresora" id="impresora"
                                            name="services[]">
                                        <label class="form-check-label" for="impresora">
                                            Impresora
                                        </label>
                                        @endif
                                    </div>
                                    <button class="btn btn-primary float-right my-1" type="submit">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <a class="navbar-brand text-white d-md-none" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a class="navbar-brand text-white d-none d-md-flex mx-5" href="{{ url('/') }}">
                    <img src="{{asset('img/canaryWorkspaces.png')}}" alt="CanaryWorkspaces">
                </a>
                @else
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @endif

                <button class="navbar-toggler bg-white" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="container-fluid">
                @yield('content')
                @include('partials.footer')
            </div>
        </main>
    </div>
</body>

</html>