<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UploadFilesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function HomeBasicTest()
    {
        // home page test
        $response = $this->get('/files/upload');
        $response->assertStatus(200);
    }
}
