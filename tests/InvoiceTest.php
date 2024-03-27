<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_create_invoice(): void
    {
        $user = User::factory()->create();
        $this->artisan('db:seed');
        $user->assignRole('sales');
        $this->actingAs($user);
        $response = $this->get('/admin/invoices/create');
        $response->assertStatus(200);
    }

    public function test_sales_person_cannot_delete_invoice(): void
    {
        $user = User::factory()->create();
        $this->artisan('db:seed');
        $user->assignRole('sales');
        $this->actingAs($user);
        $response = $this->delete('/admin/invoices/1');
        $response->assertStatus(404);
    }
}
