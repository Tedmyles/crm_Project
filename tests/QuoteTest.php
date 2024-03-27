<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuoteTest extends TestCase
{
    //use the refresh database trait
    use RefreshDatabase;
    //test that a user can create a quote
    public function test_user_can_create_quote(): void
    {
        $user = User::factory()->create();
        $this->artisan( 'db:seed' );
        $user->assignRole( 'sales' );
        $this->actingAs($user);
        $response = $this->get('/admin/quotes/create');
        $response->assertStatus(200);
    }
    //test that a user with the role of sales cannot delete a quote
    public function test_sales_person_cannot_delete_quote(): void
    {
        $user = User::factory()->create();
        $this->artisan( 'db:seed' );
        $user->assignRole( 'sales' );
        $this->actingAs($user);
        $response = $this->delete('/admin/quotes/1');
        $response->assertStatus(404);
    }
}
