<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';
    protected $fillable = ['name','type'];
}
