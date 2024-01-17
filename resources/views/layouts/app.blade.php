<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TY THANH PC AND EMAIL LIST</title>
    {{-- favicon --}}
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- js and css -->
    <link rel="stylesheet" href="{{asset('adminn/style.css')}}">
    <script src="{{asset('js/jquery/jquery-3.7.0.js')}}"></script>
    <script src="{{asset('js/ajax/jquery.min.js')}}"></script>
   <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{asset('img/logo.png')}}" alt="Logo Ty Thanh" width="70px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                        @else
                            <li><a class="nav-link" href="{{ route('viewhome') }}">View Website</a></li>
                            @canany(['create-role', 'edit-role', 'delete-role'])
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a></li>
                            @endcanany
                            @canany(['create-user', 'edit-user', 'delete-user'])
                                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            @endcanany
                            @canany(['create-pcname', 'edit-pcname', 'delete-pcname', 'import_pcname'])
                                <li><a class="nav-link" href="{{ route('pcnames.index') }}">Pc Name</a></li>
                            @endcanany
                            @canany(['create-dep', 'edit-dep', 'delete-dep'])
                                <li><a class="nav-link" href="{{ route('deps.index') }}">Manage Deps</a></li>
                            @endcanany
                            @canany(['create-email', 'edit-email', 'delete-email','show-email'])
                            <li><a class="nav-link" href="{{ route('emails.index') }}">Manage Emails</a></li>
                            @endcanany
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        <h3 class="text-center mt-3 mb-3">TY THANH PC & EMAIL LIST</a></h3>
                        @yield('content')
                        <div class="row justify-content-center text-center mt-3">
                            <div class="col-md-12">
                                <p>
                                    Ty Thanh Footwear Co., Ltd. Designed and Developed by IT YC.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('adminn/list.js')}}"></script>
    @yield('script')
</body>
</html>
