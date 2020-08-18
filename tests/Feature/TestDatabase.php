<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestDatabase extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test for database.
     *
     * @return void
     */
    public function DatabaseInit()
    {
        // home page test
         $user = factory(App\User::class)->make();
         $company = factory(App\company::class)->make();
         $files = factory(App\files::class)->make();

         $companies = factory(App\company::class, 3)
            ->create()
            ->each(function ($company) {
                $company->posts()->save(factory(App\tags::class)->make());
        });
        $this->assertDatabaseHas('company', $company);
        $this->assertDatabaseHas('files', $files);
    }
}