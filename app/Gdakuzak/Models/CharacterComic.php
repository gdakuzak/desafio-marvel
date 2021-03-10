<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacterComic extends Pivot
{
    protected $table = 'character_comic';
    protected $fillable = ['character_id','comic_id'];   
}
