<?php

namespace Tests\Feature;

use Closure;
use Tests\TestCase;
use App\Gdakuzak\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     * @dataProvider applicationDataProvider
     * @return void
     */
    public function testList(Closure $testSuite)
    {
        $scenario = $testSuite();
        $response = $this->actingAs(User::factory()->create(),'sanctum')->get($scenario['route']);
        $response->assertStatus($scenario['status'])->assertJsonStructure($scenario['expected']);
    }

    public function applicationDataProvider()
    {
        return [
            'call index return' => [
                function () {
                    return [
                        'route' => route('characters.index'),
                        'status' => 200,
                        'expected' => []
                    ];
                }
            ],
        ];
    }
}
