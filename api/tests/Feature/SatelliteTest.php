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

        $response->assertStatus(200);
        $response->assertSee('data');
    }

    public function testGetSpecificSatellite()
    {
        $response = $this->get('api/v1/satellite/1');

        $response->assertStatus(200);
        $response->assertSee('data');
    }
}
