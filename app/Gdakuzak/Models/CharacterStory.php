<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacterStory extends Pivot
{
    protected $table = 'character_story';   
    protected $fillable = ['character_id','story_id'];   
}
