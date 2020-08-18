<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddCompaniesTest extends TestCase
{
    /**
     * A basic test for companies page.
     *
     * @return void
     */
    public function HomeBasicTest()
    {
        // home page test
        $response = $this->get('/company/create');
        $response->assertStatus(200);
    }
}
