<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestHome extends TestCase
{

    /** @test */
    public function HomeBasicTest()
    {
        // home page test
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }
    /** @test */
    public function HomeFailTest()
    {
        $response = $this->call('POST', '/');
        $this->assertEquals(405, $response->status());
    }
     /** @test */
    public function FakePageTest()
    {
        $response = $this->call('POST', '/random');
        $this->assertEquals(405, $response->status());
    }
      /** @test */
    public function FakePage2Test()
    {
        $response = $this->call('POST', '/1');
        $this->assertEquals(405, $response->status());
    }
          /** @test */
    public function CompanyIdTest()
    {
        $response = $this->call('POST', '/companies:1');
        $this->assertEquals(405, $response->status());
    }
}
