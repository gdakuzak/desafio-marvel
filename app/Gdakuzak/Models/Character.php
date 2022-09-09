<?php

namespace App\Gdakuzak\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Character extends Model
{
    use HasFactory;

    protected $table = 'characters';
    protected $fillable = ['name','description'];
    protected $with = ['comics','events','series','stories'];

    function comics()
    {
        return $this->belongsToMany(Comic::class)->using(CharacterComic::class);
    }

    function events()
    {
        return $this->belongsToMany(Event::class)->using(CharacterEvent::class);
    }

    function series()
    {
        return $this->belongsToMany(Serie::class)->using(CharacterSerie::class);
    }

    function stories()
    {
        return $this->belongsToMany(Story::class)->using(CharacterStory::class);
    }

}
