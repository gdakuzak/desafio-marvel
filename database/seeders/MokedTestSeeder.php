<?php

namespace Database\Seeders;

use App\Gdakuzak\Models\Comic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MokedTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comic::factory()->count(1)->state(['name' => 'Spider-pig #1'])->create();
        // Event::factory()->count(1)->create();
        // Serie::factory()->count(1)->create();
        // Story::factory()->count(1)->create();
        // Character::factory()->count(1)->create()->each(function ($character) {

        //     $character->comics()->sync([
        //         'character_id' => $character->id,
        //         'comic_id' => Comic::inRandomOrder()->first()->id,
        //     ]);

        //     $character->events()->sync([
        //         'character_id' => $character->id,
        //         'event_id' => Event::inRandomOrder()->first()->id,
        //     ]);

        //     $character->series()->sync([
        //         'character_id' => $character->id,
        //         'serie_id' => Serie::inRandomOrder()->first()->id,
        //     ]);

        //     $character->stories()->sync([
        //         'character_id' => $character->id,
        //         'story_id' => Serie::inRandomOrder()->first()->id,
        //     ]);
        // });
    }
}
