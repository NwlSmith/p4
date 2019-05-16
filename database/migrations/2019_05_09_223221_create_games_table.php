<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('player1_id');
            $table->bigInteger('player2_id');
            $table->boolean('active')->default(true); # default to true
            $table->boolean('player1_turn')->default(false); # default to false, challenger goes second
            # rows and columns of the game itself.
            # 0 = empty, 1 = player1, 2 = player2
            $table->unsignedTinyInteger('a1')->default(0);
            $table->unsignedTinyInteger('a2')->default(0);
            $table->unsignedTinyInteger('a3')->default(0);
            $table->unsignedTinyInteger('b1')->default(0);
            $table->unsignedTinyInteger('b2')->default(0);
            $table->unsignedTinyInteger('b3')->default(0);
            $table->unsignedTinyInteger('c1')->default(0);
            $table->unsignedTinyInteger('c2')->default(0);
            $table->unsignedTinyInteger('c3')->default(0);
            $table->unsignedTinyInteger('winner')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
