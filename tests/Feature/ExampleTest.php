<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class ExampleTest extends TestCase
{
    public function test_admin_dashboard_page()
    {
        //$user = factory(User::class)->make();
        //$user = User::factory()->create();
        $this->assertAuthenticated();
        $reponse = $this->get('/admin/dashboard');

        $reponse->assertStatus(200);
    }
}
