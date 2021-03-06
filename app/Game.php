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
        $users = $this->users;

        return ($users[0]->id == $thisID) ? $users[1] : $users[0];
    }

    public function checkIfPlayer1($thisID)
    {
        return ($thisID == $this->player1_id);
    }

    public function getUserNumber($thisID)
    {
        return ($this->checkIfPlayer1($thisID) ? '1' : '2');
    }

    public function checkIfUserTurn($thisID)
    {
        return $this->active && (($this->player1_turn && $this->checkIfPlayer1($thisID)) || (!$this->player1_turn && !$this->checkIfPlayer1($thisID)));
    }

    public function checkIfUserWon($thisID)
    {
        return !$this->active && $this->winner == $this->getUserNumber($thisID);
    }

    public function checkIfUserIsPlayer($thisID)
    {
        return $this->player1_id != $thisID && $this->player2_id != $thisID;
    }

    public function checkIfBoardFull()
    {
        return ($this->a1 && $this->a2 && $this->a3 && $this->b1 && $this->b2 && $this->b3 && $this->c1 && $this->c2 && $this->c3);
    }
}
