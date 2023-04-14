<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="container">
    <header>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container header py-3" style="background-image: url('/storage/images/BANNER1.jpg');">
                <a href="{{ route('home.index') }}" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Laravel 8 УТП</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="menu-items">
                        <a class=" py-2 text-decoration-none" href="{{ route('todo.index') }}">Список заданий</a>
                        <a class=" py-2 text-decoration-none" href="{{ route('welcome.index') }}">Vue3</a>
                        <a class=" py-2 text-decoration-none" href="{{ route('product.index') }}">Каталог продуктов</a>
                        <a class=" py-2 text-decoration-none" href="{{ route('about.index') }}">О проекте</a>
                        <a class=" py-2 text-decoration-none" href="{{ route('support.index') }}">Поддержка</a>
                        <a class=" py-2 text-decoration-none" href="{{ route('review.index') }}">Отзывы</a>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
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
    </header>
        <main class="content py-4">
            @yield('content')
        </main>

        <footer class="d-flex flex-wrap justify-content-between align-items-center my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">2023 © laravel 8 УТП</p>

            <ul class="nav col-md-6 justify-content-end">
                <li class="nav-item"><a href="{{ route('todo.index') }}" class="nav-link px-2 text-muted">Список заданий</a></li>
                <li class="nav-item"><a href="{{ route('welcome.index') }}" class="nav-link px-2 text-muted">Vue3</a></li>
                <li class="nav-item"><a href="{{ route('product.index') }}" class="nav-link px-2 text-muted">Каталог продуктов</a></li>
                <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link px-2 text-muted">О проекте</a></li>
                <li class="nav-item"><a href="{{ route('support.index') }}" class="nav-link px-2 text-muted">Поддержка</a></li>
                <li class="nav-item"><a href="{{ route('review.index') }}" class="nav-link px-2 text-muted">Отзыв</a></li>
            </ul>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
