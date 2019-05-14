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
            <li id='player'>
                <h5>Name</h5>
                <p class='playerdesc'>
                    Num wins Num losses<br>
                    start game/already playing game
                </p>
            </li>
        </ul>
    </div>
    <div id='activeList'>
        <h3>
            Active Games:
        </h3>
        <ul>
            <!-- For loop for each active game, ordered ascending by last move-->
            <li id='activeGame'>
                <h5>Other Player's name</h5>
                <p class='playerdesc'>
                    Their turn or your turn - special styling if your turn<br>
                    preview of board?
                </p>
            </li>
        </ul>
    </div>
    <div id='finishedList'>
        <h3>
            Past Games:
        </h3>
        <ul>
            <!-- For loop for each finished game, ordered descending by last move (end time) -->
            <li id='finishedGame'>
                <h5>Other Player's name</h5>
                <p class='playerdesc'>
                    Win or loss<br>
                    preview of board?
                </p>
            </li>
        </ul>
    </div>
@endsection