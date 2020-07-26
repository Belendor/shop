
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->


    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.js" defer></script>

    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" type="module" defer></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
 
                        <li class="nav-item">
                            <div class="cart-button default-button"> <p class="cart-text">Krepšelis</p> 
                                @yield('cart')
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
         <!-- Prideta -->
         <main class="padding-vertical">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        @if ($errors->any())
                        <div class="alert">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        @if(session()->has('success_message'))
                            <div class="alert alert-success" role="alert">
                                {{session()->get('success_message')}}
                            </div>
                        @endif
                        
                        @if(session()->has('info_message'))
                            <div class="alert alert-info" role="alert">
                                {{session()->get('info_message')}}
                            </div>
                        @endif

                        @if(session()->has('failure_message'))
                            <div class="alert alert-danger" role="alert">
                                {{session()->get('failure_message')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>             
        </main>
        <!-- Prideta -->
        <main class="py-4">
            @yield('content')
        </main>
        <main class="py-4">
            @yield('pizza')
        </main>
    </div>
</body>
</html>
