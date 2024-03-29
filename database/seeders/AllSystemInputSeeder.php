<?php

namespace Database\Seeders;

use App\Gdakuzak\Models\Comic;
use App\Gdakuzak\Models\Event;
use App\Gdakuzak\Models\Serie;
use App\Gdakuzak\Models\Story;
use Illuminate\Database\Seeder;
use App\Gdakuzak\Models\Character;
use App\Gdakuzak\Models\CharacterComic;
use App\Gdakuzak\Models\CharacterEvent;
use App\Gdakuzak\Models\CharacterSerie;
use App\Gdakuzak\Models\CharacterStory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AllSystemInputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Quando rodar local para testar o seeder, descomentar.
        // Comic::truncate();
        // Event::truncate();
        // Serie::truncate();
        // Story::truncate();
        // Character::truncate();
        // CharacterComic::truncate();
        // CharacterEvent::truncate();
        // CharacterSerie::truncate();
        // CharacterStory::truncate();

        Comic::factory()->count(1)->create();
        Event::factory()->count(1)->create();
        Serie::factory()->count(1)->create();
        Story::factory()->count(1)->create();
        Character::factory()->count(1)->create()->each(function ($character) {

            $character->comics()->sync([
                'character_id' => $character->id,
                'comic_id' => Comic::inRandomOrder()->first()->id,
            ]);

            $character->events()->sync([
                'character_id' => $character->id,
                'event_id' => Event::inRandomOrder()->first()->id,
            ]);

            $character->series()->sync([
                'character_id' => $character->id,
                'serie_id' => Serie::inRandomOrder()->first()->id,
            ]);

            $character->stories()->sync([
                'character_id' => $character->id,
                'story_id' => Serie::inRandomOrder()->first()->id,
            ]);
        });
    }
}
