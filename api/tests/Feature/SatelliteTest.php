<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SatelliteTest extends TestCase
{
    public function testGetAllSatellites()
    {
        $response = $this->get('api/v1/satellite');

        $response->assertSee('message');
    }

    public function testGetSpecificSatellite()
    {
        $response = $this->get('api/v1/satellite/1');

        $response->assertSee('message');
    }
}
