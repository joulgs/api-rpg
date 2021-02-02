<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * @test
     * @dataProvider urlProvider
     */
    public function allRoutesMustWork($url)
    {
        $response = $this->get($url);

        $response->assertStatus(200);
        $this->assertNotEmpty($response);
    }

    public function urlProvider()
    {
        return [
            'testDiceRollUrl' => ['url' => '/api/roll/1d20'],
            'testMonsterIndexUrl' => ['url' => '/api/monsters'],
        ];
    }
}
