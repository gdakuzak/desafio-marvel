<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comic extends Model
{
    use HasFactory;

    protected $table = 'comics';
    protected $fillable = ['name'];
}
