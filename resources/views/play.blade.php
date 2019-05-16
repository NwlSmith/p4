@extends('layouts.master')

@section('title')
    Game with {{ $otherPlayer->name }}
@endsection

@section('content')

    @include('includes.in-game-menu', ['game' => $game, 'user' => $user])

    <form id='board' method='POST' action='/{{ $game->id }}'>
        {{ csrf_field() }}
        {{ method_field('put') }}


            @include('includes.board-button', ['square' => 'a1', 'value' => $game->a1])
            @include('includes.board-button', ['square' => 'a2', 'value' => $game->a2])
            @include('includes.board-button', ['square' => 'a3', 'value' => $game->a3])
            @include('includes.board-button', ['square' => 'b1', 'value' => $game->b1])
            @include('includes.board-button', ['square' => 'b2', 'value' => $game->b2])
            @include('includes.board-button', ['square' => 'b3', 'value' => $game->b3])
            @include('includes.board-button', ['square' => 'c1', 'value' => $game->c1])
            @include('includes.board-button', ['square' => 'c2', 'value' => $game->c2])
            @include('includes.board-button', ['square' => 'c3', 'value' => $game->c3])

    </form>

@endsection