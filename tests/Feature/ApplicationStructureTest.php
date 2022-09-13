<?php

namespace Tests\Feature;

use Closure;
use Tests\TestCase;
use App\Gdakuzak\Models\User;
use Database\Seeders\AllSystemInputSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ApplicationStructureTest extends TestCase
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
            'call characters return' => [
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
            'call comic structure' => [
                function () {
                    return [
                        'route' => route('characters.comics.show',1),
                        'status' => 200,
                        'expected' => [
                            'id',
                            'name',
                            'description',
                            'comics' => [
                                [
                                    'id','name','created_at','updated_at'
                                ]
                            ]
                        ]
                    ];
                }
            ],
            'call series structure' => [
                function () {
                    return [
                        'route' => route('characters.series.show',1),
                        'status' => 200,
                        'expected' => [
                            'id',
                            'name',
                            'description',
                            'series' => [
                                [
                                    'id','name','created_at','updated_at'
                                ]
                            ]
                        ]
                    ];
                }
            ],
            'call event structure' => [
                function () {
                    return [
                        'route' => route('characters.events.show',1),
                        'status' => 200,
                        'expected' => [
                            'id',
                            'name',
                            'description',
                            'events' => [
                                [
                                    'id','name','created_at','updated_at'
                                ]
                            ]
                        ]
                    ];
                }
            ],
            'call stories structure' => [
                function () {
                    return [
                        'route' => route('characters.stories.show',1),
                        'status' => 200,
                        'expected' => [
                            'id',
                            'name',
                            'description',
                            'stories' => [
                                [
                                    'id','name','created_at','updated_at'
                                ]
                            ]
                        ]
                    ];
                }
            ],
        ];
    }
}
