<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Game;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable

    public function index()
    {
        /*# ** NEW LINE ** Get the user object
    $user = $request->user();

    # ** UPDATED LINE ** Edit the books query so it's fetching the books via the user object
    $books = $user->books()->orderBy('title')->get();

        return view('index');
    }*/

    public function index(Request $request)
    {
        # need:
        # players, except ones that you are already playing
        # active games
        # past games
        # from active games, get list of players with active games, exclude those from players list

        $user = $request->user();
        //$games = $user->games->toArray();
        $players = User::where('id', '!=', $user->id)->get();

        if (count($games = $user->games->toArray()) > 0) {
            # retrieve all games
            //$games = $games->orderBy('updated_at')->pluck('id')->toArray();
            $gamesActive = [];
            $gamesPast = [];
            # retrieve all games and sort them
            foreach ($games as $game) {
                if ($game['active']) {
                    {

                        if($game['player1_id'] != $user->id)
                            players
                        array_push($gamesActive, $game);
                    }
                } else {
                    array_push($gamesPast, $game);
                }
            }
        }
        //dd($players);


        $playersAll = User::with('games')->orderBy('name')->get();

        $playersRelevant = $playersAll;

        foreach($playersAll as $player => $id)
        {

        }

        $games = Book::with('author')->orderBy('title')->get();

        $newBooks = $books->sortByDesc('created_at')->take(3);

        return view('index')->with([
            'books' => $books,
            'newBooks' => $newBooks,
        ]);
    }

    /* show

     *
     # NEW CODE:
    if (!Gate::allows('books.manage', $book)) {
        return redirect('/books')->with(['alert' => 'Access denied.']);
    }
     */
}
