<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestFiles extends TestCase
{
    /** @test */
    public function HomeBasicTest()
    {
        // home page test
        $response = $this->call('GET', '/files');
        $this->assertEquals(200, $response->status());
    }
    /** @test */
    public function HomeFailTest()
    {
        // home page test
        $response = $this->call('POST', '/files');
        $this->assertEquals(405, $response->status());
    }
}
