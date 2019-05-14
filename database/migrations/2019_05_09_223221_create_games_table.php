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
            $table->boolean('active')->default(true); # default to true
            $table->boolean('player1_turn')->default(false); # default to false, challenger goes second
            # rows and columns of the game itself.
            # 0 = empty, 1 = player1, 2 = player2
            $table->unsignedTinyInteger('a1');
            $table->unsignedTinyInteger('a2');
            $table->unsignedTinyInteger('a3');
            $table->unsignedTinyInteger('b1');
            $table->unsignedTinyInteger('b2');
            $table->unsignedTinyInteger('b3');
            $table->unsignedTinyInteger('c1');
            $table->unsignedTinyInteger('c2');
            $table->unsignedTinyInteger('c3');
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
