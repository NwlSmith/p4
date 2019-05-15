<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <link href='/css/stylesheet.css' rel='stylesheet'>

    @yield('head')
</head>
<body>

<header>
    <a href='http://nwlsmith.com'>
        <img src='http://nwlsmith.com/images/general/Nate-logo-200.png'
             alt='Logo'
             id='logo'></a>
    <h1>Tic Tac Toe</h1>
    <h1>Wins: {{ $user->wins }} Losses: {{ $user->losses }}</h1>
    @if( Auth::check() )
        <form method='POST' id='logout' action='/logout'>
            {{ csrf_field() }}
            <a href='#' onClick='document.getElementById("logout").submit();'>Logout  {{ $user->name }}</a>
        </form>
    @endif
</header>

<section>
    @yield('content')
</section>

<footer>
    Nate Smith - {{ date('Y') }}
</footer>

</body>
</html>