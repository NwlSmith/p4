<?php

use Illuminate\Database\Seeder;

use App\Game;
use App\User;

class GamesTableSeeder extends Seeder
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
            # a1 a2 a3 b1 b2 b3 c1 c2 c3 winner
            # 0 = empty, 1 = player1, 2 = player2
            [ 1, 2, true, false, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], # 1
            [ 2, 3, true, true, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0], # 2
            [ 3, 4, true, false, 0, 1, 0, 0, 2, 0, 0, 0, 0, 0], # 3
            [ 4, 5, true, true, 2, 1, 0, 0, 2, 0, 0, 0, 0, 0], # 4
            [ 5, 1, true, false, 2, 1, 1, 0, 2, 0, 0, 0, 0, 0], # 5
            [ 1, 3, true, false, 2, 1, 1, 0, 2, 0, 0, 0, 2, 0], # 6
            [ 1, 4, false, false, 2, 1, 1, 0, 2, 0, 0, 0, 2, 1], # 7
            [ 2, 4, true, true, 2, 1, 1, 1, 2, 2, 0, 2, 1, 0], # 8
        ];

        $count = count($games);

        foreach ($games as $key => $gameData) {

            # First, figure out the id of the players we want to associate with this book


            $game = new Game();
            $game->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $game->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $game->player1_id = $gameData[0];
            $game->player2_id = $gameData[1];
            $game->active = $gameData[2];
            $game->player1_turn = $gameData[3];
            $game->a1 = $gameData[4];
            $game->a2 = $gameData[5];
            $game->a3 = $gameData[6];
            $game->b1 = $gameData[7];
            $game->b2 = $gameData[8];
            $game->b3 = $gameData[9];
            $game->c1 = $gameData[10];
            $game->c2 = $gameData[11];
            $game->c3 = $gameData[12];
            $game->winner = $gameData[13];

            $game->save();
            $count--;
        }
    }
}
