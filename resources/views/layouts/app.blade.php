<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>

    <!-- Styles-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

     <!-- swal desde las funciones de sweet alert 2 -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.9.0/dist/sweetalert2.all.min.js"></script>
    <!-- fin desde las funciones -->

    <!-- para sweet alert desde el contralador -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
   <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @guest
                    <label>SerresVerificadora SPA.</label>
                    @else
                        <div class="dropdown">
                                @can('solicitudesCliente.index')
                                <button class="mr-2 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administración de Solicitudes
                                </button>
                                @endcan
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @can('solicitudesClienteEnviadas.crud')
                                    <a class="dropdown-item" href="{{ route('solicitudesCliente.create') }}">Iniciar Solicitudes</a>
                                @endcan 
                                @can('solicitudesClienteEnviadas.crud')
                                    <a class="dropdown-item" href="{{ route('solicitudesClienteEnviadas.index') }}">Solicitudes Enviadas y Observadas</a>
                                @endcan 
                                @can('solicitudesClienteEnviadas.crud')
                                    <a class="dropdown-item" href="{{ route('solicitudesClienteGuardadas.index') }}">Solicitudes Aprobadas y Guardadas</a>
                                @endcan 
                            </div>
                        </div>
                    @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('sweet::alert')
    
</body>
</html>
