<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $table = 'comics';
    protected $fillable = ['name'];
}
