<?php

namespace Database\Factories\Gdakuzak\Models;

use App\Gdakuzak\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Gdakuzak\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['cover','interiorStory'];
        $number = rand(0,(count($types)-1));

        return [
            'name' => $this->faker->word(),
            'type' => $types[$number],
        ];
    }
}
