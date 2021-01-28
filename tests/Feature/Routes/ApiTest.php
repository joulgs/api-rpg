<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;

class RoutesApiTest extends TestCase
{
    /**
     * @test
     */
    public function allRoutesMustWork()
    {
        $response = $this->get('/api/roll/1d20');


        $response->assertStatus(200);
        $this->assertNotEmpty($response);
    }
}
