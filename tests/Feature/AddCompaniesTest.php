<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestAddCompanies extends TestCase
{
    /** @test */
    public function HomeBasicTest()
    {
        // home page test
        $response = $this->call('GET', '/companies/create');
        $this->assertEquals(200, $response->status());
    }
     /** @test */
    public function HomeFailTest()
    {
        // home page test
        $response = $this->call('POST', '/companies/create');
        $this->assertEquals(405, $response->status());
    }
}
