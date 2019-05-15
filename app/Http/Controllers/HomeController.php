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
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     * public function index()
     * {
     * /*# ** NEW LINE ** Get the user object
     * $user = $request->user();
     * # ** UPDATED LINE ** Edit the books query so it's fetching the books via the user object
     * $books = $user->books()->orderBy('title')->get();
     * return view('index');
     * }*/

    public function index(Request $request)
    {
        $user = $request->user();
        //$games = $user->games->toArray();

        $playersRemove = [];
        array_push($playersRemove, $user->id);

        # retrieve all games
        $gamesActive = [];
        $gamesPast = [];

        if (count($games = $user->games) > 0) {
            # sort them
            foreach ($games as $game) {
                if ($game->active) {
                    {
                        array_push($playersRemove, $game->getOtherPlayer($user->id)->id);

                        array_push($gamesActive, $game);
                    }
                } else {
                    array_push($gamesPast, $game);
                }
            }
        }
        $players = User::whereNotIn('id', $playersRemove)->get();

        return view('index')->with([
            'players' => $players,
            'gamesActive' => $gamesActive,
            'gamesPast' => $gamesPast,
            'user' => $user
        ]);
    }

    public function show(Request $request, $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return redirect('/')->with(['alert' => 'The game you were looking for was not found']);
        }

        $user = $request->user();

        //dd($game);

        //dd('$game->checkIfUserIsPlayer($user->id)' . $game->checkIfUserIsPlayer($user->id));
        if ($game->checkIfUserIsPlayer($user->id)) {
            return redirect('/')->with(['alert' => 'Access denied.']);
        }

        return view('view')->with([
            'game' => $game,
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $game = Game::find($id);

        # Set the properties
        # Note how each property corresponds to a field in the table
        $game->player1_turn = !$game->player1_turn;
        $a1 = $request->a1;
        $a2 = $request->a2;
        $a3 = $request->a3;
        $b1 = $request->b1;
        $b2 = $request->b2;
        $b3 = $request->b3;
        $c1 = $request->c1;
        $c2 = $request->c2;
        $c3 = $request->c3;

        $game->a1 = $a1;
        $game->a2 = $a2;
        $game->a3 = $a3;
        $game->b1 = $b1;
        $game->b2 = $b2;
        $game->b3 = $b3;
        $game->c1 = $c1;
        $game->c2 = $c2;
        $game->c3 = $c3;

        #calculate if winner
        $winner = 0;
        for ($i = 1; $i <= 2; $i++) {
            if ($a1 == $i) {
                if ($a2 == $i && $a3 == $i) {
                    $winner = $i;
                    break;
                } else if ($b2 == $i && $c3 == $i) {
                    $winner = $i;
                    break;
                } else if ($b1 == $i && $c1 == $i) {
                    $winner = $i;
                    break;
                }
            } else if ($a2 == $i) {
                if ($b2 == $i && $c2 == $i) {
                    $winner = $i;
                    break;
                }
            } else if ($a3 == $i) {
                if ($b3 == $i && $c3 == $i) {
                    $winner = $i;
                    break;
                } else if ($b2 == $i && $c1 == $i) {
                    $winner = $i;
                    break;
                }
            } else if ($b1 == $i) {
                if ($b2 == $i && $b3 == $i) {
                    $winner = $i;
                    break;
                }
            } else if ($c1 == $i) {
                if ($c2 == $i && $c3 == $i) {
                    $winner = $i;
                    break;
                }
            }
        }

        if ($winner)
        {
            dump('woah you actually won!');

            $game->winner = $winner;
            $game->active = false;
        }

        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $game->save();

        return redirect('/' . $id)->with(['alert' => 'Your changes were saved']);
    }
}
