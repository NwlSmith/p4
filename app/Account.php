<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function games()
    {
        # Account has many Games
        # Define a one-to-many relationship.
        return $this->hasMany('App\Game');
    }
}