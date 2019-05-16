@if(!$value)
    <button type='submit'
            name='button'
            value='{{$square}}'
            class='boardSquare'
            id='{{$square}}'>
        @include('includes.board-marker', ['square' => $game->getUserNumber($user->id)])
    </button>
@else
    @include('includes.board-button-inactive', ['square' => $square, 'value' => $value])
@endif