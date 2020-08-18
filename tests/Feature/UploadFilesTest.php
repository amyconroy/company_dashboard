<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestUploadFiles extends TestCase
{
    /** @test */
    public function HomeBasicTest()
    {
        // file upload test
        $response = $this->call('GET', '/files/upload');
        $this->assertEquals(200, $response->status());
    }
     /** @test */
    public function HomeFailTest()
    {
        // home page test
        $response = $this->call('POST', '/files/upload');
        $this->assertEquals(405, $response->status());
    }
}
