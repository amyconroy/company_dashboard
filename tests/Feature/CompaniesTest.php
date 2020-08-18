<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
    /**
     * A basic test for upload files page.
     *
     * @return void
     */
    public function HomeBasicTest()
    {
        // home page test
        $response = $this->get('/companies');
        $response->assertStatus(200);
    }
}
