<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- подключаем стили Summernote -->

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Посты<span class="caret"></span>
                        </a>
<<<<<<< HEAD
                        <ul class="dropdown-menu">
                            <li><a href="/posts">Все записи</a></li>
                            @if (auth()->check())
                                <li><a href="/posts?name={{auth()->user()->name}}">Мои записи</a></li>
                                <li><a href="/posts/create">Создать запись</a></li>
                            @endif
                        </ul>
                    </li>
                    @if (auth()->check())
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Настройки<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li><a href="/filters">Фильтр слов</a></li>
                                <li><a href="/admin">Админка</a></li>

                            </ul>
                        </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">Вход</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
=======
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Посты<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/posts">Все записи</a></li>
                                    @if (auth()->check())
                                    <li><a href="/posts?name={{auth()->user()->name}}">Мои записи</a></li>
                                    <li><a href="/posts/create">Создать запись</a></li>
                                    @endif
                                </ul>
                            </li>
                            @if (auth()->check())
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Настройки<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    
                                    <li><a href="/filters">Фильтр слов</a></li>
                                    <li><a href="/admin">Админка</a></li>
                                    
                                </ul>
                            </li>
                            @endif
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                            <li><a href="{{ route('login') }}">Вход</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
>>>>>>> 10cbb11750688e8928926d6a00b9aa4b33bb755e
                                                   document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4">
                @yield('sidebar')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>

<!-- подключаем сам summernote -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>

<script>

<<<<<<< HEAD
    $(document).ready(function () {

        $('#text').summernote();

    });
=======
                                               $(document).ready(function () {

                                                   $('#text').summernote();

                                               });
>>>>>>> 10cbb11750688e8928926d6a00b9aa4b33bb755e

</script>
</html>
