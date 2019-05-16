@extends('layouts.master')

@section('title')
    Game with {{ $otherPlayer->name }}
@endsection

@section('content')
    <div id='gamePage'>
        @if (!$game->active)
            <h2>{{$game->checkIfUserWon($user->id) ? 'You Won!' : 'You Lost'}}</h2>
        @else
            <h2>Waiting for other player...</h2>
        @endif

        @include('includes.in-game-menu', ['game' => $game, 'user' => $user])

        <div id='board'>

            @include('includes.board-button-inactive', ['square' => 'a1', 'value' => $game->a1])
            @include('includes.board-button-inactive', ['square' => 'a2', 'value' => $game->a2])
            @include('includes.board-button-inactive', ['square' => 'a3', 'value' => $game->a3])
            @include('includes.board-button-inactive', ['square' => 'b1', 'value' => $game->b1])
            @include('includes.board-button-inactive', ['square' => 'b2', 'value' => $game->b2])
            @include('includes.board-button-inactive', ['square' => 'b3', 'value' => $game->b3])
            @include('includes.board-button-inactive', ['square' => 'c1', 'value' => $game->c1])
            @include('includes.board-button-inactive', ['square' => 'c2', 'value' => $game->c2])
            @include('includes.board-button-inactive', ['square' => 'c3', 'value' => $game->c3])
        </div>
    </div>
@endsection