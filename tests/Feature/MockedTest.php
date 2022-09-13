<?php

namespace Tests\Feature;

use Closure;
use Tests\TestCase;
use App\Gdakuzak\Models\User;
use Database\Seeders\MokedTestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MockedTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(MokedTestSeeder::class);
    }

    /**
     * A basic test example.
     * @dataProvider mokedDataProvider
     * @return void
     */
    public function testMokedList(Closure $testSuite)
    {
        $scenario = $testSuite();
        $response = $this->actingAs(User::factory()->create(),'sanctum')->get($scenario['route']);
        $response->assertStatus($scenario['status']);
        $this->assertEquals($scenario['expected'],$response[$scenario['expectedField']]);
    }

    public function mokedDataProvider()
    {
        return [
            'compare comic name' => [
                function () {
                    return [
                        'route' => route('comics.show',1),
                        'status' => 200,
                        'expectedField' => 'name',
                        'expected' => 'Spider-pig #1',
                    ];
                }
            ],
        ];
    }

    /**
     * A basic test example.
     * @dataProvider mokedCountDataProvider
     * @return void
     */
    public function testCountList(Closure $testSuite)
    {
        $scenario = $testSuite();
        $response = $this->actingAs(User::factory()->create(),'sanctum')->get($scenario['route']);
        $response->assertStatus($scenario['status'])->assertJsonCount($scenario['expected']);
    }

    public function mokedCountDataProvider()
    {
        return [
            'check number of comics' => [
                function () {
                    return [
                        'route' => route('comics.index'),
                        'status' => 200,
                        'expected' => 1,
                    ];
                }
            ],
            'call number of stories' => [
                function () {
                    return [
                        'route' => route('comics.index'),
                        'status' => 200,
                        'expected' => 1,
                    ];
                }
            ]
        ];
    }
}
