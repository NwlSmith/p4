@extends('layouts.master')

@section('title')
    Games
@endsection

@section('content')
    <div id='playersList'>
        <h3>
            Players:
        </h3>
        <ul>
            <!-- For loop for each player-->
            @foreach($players as $player)
                <li id='player'>
                    <h5>{{ $player->name }}</h5>
                    <p class='playerdesc'>
                        Wins: {{ $player->wins }} Losses: {{ $player->losses }}<br>

                        Challenge This player!
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
    <div id='activeList'>
        <h3>
            Active Games:
        </h3>
        <ul>
            <!-- For loop for each active game, ordered ascending by last move-->
            @foreach($gamesActive as $activeGame)
                <li id='gamesActive' class='button'>
                    <a href='/{{$activeGame->id}}' class='gameButton'>
                        <h5>{{ $activeGame->getOtherPlayer($user->id)->name }}</h5>
                        <p class='playerdesc'>
                            {{ $activeGame->checkIfUserTurn($user->id) ? 'Your turn!' : 'Waiting for other player' }}
                            <br>
                            preview of board?
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div id='finishedList'>
        <h3>
            Past Games:
        </h3>
        <ul>
            <!-- For loop for each finished game, ordered descending by last move (end time) -->
            @foreach($gamesPast as $pastGame)
                <li id='finishedGame'>
                    <h5>{{ $pastGame->getOtherPlayer($user->id)->name }}</h5>
                    <p class='playerdesc'>
                        {{ $pastGame->checkIfUserWon($user->id) ? 'You Won!' : 'You Lost' }}
                        <br>
                        preview of board?
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection