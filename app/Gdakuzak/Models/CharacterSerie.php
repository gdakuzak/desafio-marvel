<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacterSerie extends Pivot
{
    protected $fillable = ['character_id','serie_id'];   
}
