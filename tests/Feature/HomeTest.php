<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic for visiting the home page.
     *
     * @return void
     */
    public function HomeBasicTest()
    {
        // home page test
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
