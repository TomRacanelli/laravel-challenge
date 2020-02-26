<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/groups/create', ['name' => 'Sally', 'description' => 'Group Test description.']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
}
