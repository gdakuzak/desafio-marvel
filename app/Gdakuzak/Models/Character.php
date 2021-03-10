<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'character';
    protected $fillable = ['name','description'];
}
