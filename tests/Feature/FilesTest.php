<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilesTest extends TestCase
{
    /**
     * A basic test for files page.
     *
     * @return void
     */
    public function HomeBasicTest()
    {
        // home page test
        $response = $this->get('/files');
        $response->assertStatus(200);
    }
}
