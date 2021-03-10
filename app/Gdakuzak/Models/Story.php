<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'stories';
    protected $fillable = ['name','type'];
}
