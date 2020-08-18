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
         $user = factory(App\User::class)->make();
         $company = factory(App\company::class)->make();
         $files = factory(App\files::class)->make();

         $companies = factory(App\company::class, 3)
            ->create()
            ->each(function ($company) {
                $company->posts()->save(factory(App\tags::class)->make());
        });
        // ensure that the database is properly set up with the appropriate files that we just made
        $this->assertDatabaseHas('company', $company);
        $this->assertDatabaseHas('files', $files);
    }
}