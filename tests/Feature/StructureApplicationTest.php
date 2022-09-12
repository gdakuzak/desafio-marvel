<?php

namespace Tests\Feature;

use Closure;
use Tests\TestCase;
use App\Gdakuzak\Models\User;
use Database\Seeders\AllSystemInputSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StructureApplicationTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AllSystemInputSeeder::class);
    }

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
            'call only single row return' => [
                function () {
                    return [
                        'route' => route('characters.index'),
                        'status' => 200,
                        'expected' => [
                            [
                                'id',
                                'name',
                                'description',
                                'created_at',
                                'updated_at',
                                'comics' => [
                                   [
                                        'id',
                                        'name',
                                        'created_at',
                                        'updated_at',
                                    ]
                                ],
                                'events' => [
                                    [
                                        'id',
                                        'name',
                                        'created_at',
                                        'updated_at',
                                    ]
                                ],
                                'series' => [
                                    [
                                        'id',
                                        'name',
                                        'created_at',
                                        'updated_at',
                                    ]
                                ],
                                'stories' => [
                                    [
                                        'id',
                                        'name',
                                        'type',
                                        'created_at',
                                        'updated_at',
                                    ]
                                ]
                            ]
                        ]
                    ];
                }
            ],
        ];
    }
}
