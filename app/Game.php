<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /*// one game belongs to 2 users
    public function accounts() {
        return $this->belongsToMany('App\Account')->withTimestamps();
    }*/

    public function users() {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    /*
    // one game belongs to 2 users, this is player1
    public function player1() {
        return $this->belongsTo('App\User');
    }

    // one game belongs to 2 users, this is player2
    public function player2() {
        return $this->belongsTo('App\User');
    }
    */
    public function getOtherPlayer($thisID)
    {

    }
}
