<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ config('app.name', 'PAPLOT') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Amado - Furniture Ecommerce Template | Shop</title>

    <!-- Favicon  -->
    {{--
    <link rel="icon" href="img/core-img/favicon.ico"> --}}
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon" />
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{--
    <link rel="stylesheet" href=""> --}}


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}"> --}}
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    {{-- {{ config('app.name', 'PAPLOT') }} --}}
                    {{-- </a> --}}
                {{-- <div class="amado-navbar-brand"> --}}

                    <a href="{{url('home')}}"><img src="{{asset('img/core-img/logoNew.png')}}" style="width: 100px;"
                            alt=""></a>
                    {{-- <a href="{{url('home')}}"><img src="{{asset('img/core-img/logoNew.png')}}"
                            style="width: 100px;" alt=""></a> --}}
                    {{-- <a href="{{url('home')}}"><img src="{{public_path('/assets/images/logo.png')}}"
                            style="width: 100px;" alt=""></a> --}}

                    {{-- <img src="{{public_path('/assets/images/logo.png')}}" style="width: 10%; display: block;

                    margin-left: auto;
                    margin-right: auto;
                    padding: 2em;"> --}}

                    {{--
                </div> --}}

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        @endif

                        <a class="nav-link" href="{{ url('registration') }}">{{ __('Registration') }} </a>

                        {{-- registration --}}
                        @if (Route::has('registration'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration') }}">{{ __('registration') }} </a>
                        </li>
                        @endif


                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }} </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>