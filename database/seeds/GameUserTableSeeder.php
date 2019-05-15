<?php

use Illuminate\Database\Seeder;

use App\Game;
use App\User;

class GameUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = [
            # player1 player2 active(bool) player1_turn(bool)
            # a1 a2 a3 b1 b2 b3 c1 c2 c3
            # 0 = empty, 1 = player1, 2 = player2
            [ 1, 2],
            [ 2, 3],
            [ 3, 4],
            [ 4, 5],
            [ 5, 1],
            [ 1, 3],
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($games as $players) {

            # First get the game
            $game = Game::where('player1_id', '=', $players[0])->where('player2_id', '=', $players[1])->first();
            $game->player1_id = $players[0];
            $game->player2_id = $players[1];
            $game->users()->save(User::find($players[0]));
            $game->users()->save(User::find($players[1]));
        }
    }
}
