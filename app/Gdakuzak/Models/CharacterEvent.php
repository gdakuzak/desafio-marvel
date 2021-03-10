<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacterEvent extends Pivot
{
    protected $fillable = ['character_id','event_id'];   
}
