<div id='menu'>
    <a href='/'>
        <div>Return</div>
    </a><br>
    @if ($game->checkIfPlayer1($user->id))
        <h3>
            X: You<br>
            O: {{ $otherPlayer->name }}
        </h3>
    @else
        <h3>
            X: {{ $otherPlayer->name }}<br>
            O: You
        </h3>
    @endif
</div>