<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';
    protected $fillable = ['name'];
}
