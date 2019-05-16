@extends('layouts.master')

@section('title')
    Games
@endsection

@section('content')
    <div id='indexPage'>
        <div id='playersList'>
            <h3>
                Players:
            </h3>
            <ul>
                <form id='board' method='POST' action='/'>
                    {{ csrf_field() }}
                    @foreach($players as $player)
                        <li id='player'>
                            <h3>{{ $player->name }}</h3>
                            <p class='playerdesc'>
                                Wins: {{ $player->wins }} Losses: {{ $player->losses }}<br>
                                <button type='submit'
                                        name='player'
                                        value='{{ $player->id }}'
                                        class='linkButton'
                                        id='{{ $player->id }}'>
                                    Challenge This player!
                                </button>
                            </p>
                        </li>
                    @endforeach
                </form>
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
                            <h3>{{ $activeGame->getOtherPlayer($user->id)->name }}</h3>
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
                        <a href='/{{$pastGame->id}}' class='gameButton'>
                            <h3>{{ $pastGame->getOtherPlayer($user->id)->name }}</h3>
                            <p class='playerdesc'>
                                {{ $pastGame->checkIfUserWon($user->id) ? 'You Won!' : 'You Lost' }}
                                <br>
                                preview of board?
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection