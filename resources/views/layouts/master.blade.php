<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,200i" rel="stylesheet">
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


    <div id='accountInfo'>
        @if( Auth::check() )

            <h2>{{ $user->name }}</h2>
            <h3>Wins: {{ $user->wins }}<br>Losses: {{ $user->losses }}</h3>
            <form method='POST' id='logout' action='/logout'>
                {{ csrf_field() }}
                <a href='#' onClick='document.getElementById("logout").submit();' class='linkButton'>Logout</a>
            </form>
        @endif
    </div>
</header>

<section>
    @if(session('alert'))
        <div id='alert'>
            {{ session('alert') }}
        </div>
    @endif
    @yield('content')
</section>

<footer>
    Nate Smith - {{ date('Y') }}
</footer>

</body>
</html>