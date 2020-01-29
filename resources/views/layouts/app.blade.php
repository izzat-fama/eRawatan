<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head')
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
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pengguna.tuntutan.index') }}">Rekod Tuntutan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pengguna.individu.index') }}">Rekod Individu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('individu.index') }}">
                                       Rekod Tanggungan
                                    </a>
                                </li>
                                @if (auth()->user()->isAdminSemak() || auth()->user()->isAdminSah())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.individu.index') }}">
                                       Semak Tanggungan
                                    </a>
                                    </div>
                                </li>
                                @endif
                                @if (auth()->user()->isAdmin() )
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.tuntutan.index') }}">Pengurusan Tuntutan</a>
                                </li>
                                @endif
                                {{-- @if (auth()->user()->isKewangan()  && request()->is('kewangan/*')) --}}
                                @if (auth()->user()->isKewangan())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('kewangan.tuntutan.index') }}">Bayaran</a>
                                </li>
                                @endif
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->penggunanama}} | {{  Auth::user()->capaian->perananpengguna_id }} <span class="caret"></span>
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
@yield('script')
</body>
</html>
