<?php

namespace Tests\Feature;

use App\Models\Organization;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CreateOrgaizationTest extends TestCase
{
    use RefreshDatabase;
    use HandlesAuthorization;
   
  
    
    public function test_super_admin_can_create_organization(): void {
        $user = User::factory()->create();
        $this->artisan( 'db:seed' );
        $user->assignRole( 'super-admin' );
        $this->actingAs($user);
        $response = $this->get('/admin/organizations/create');
        $response->assertStatus(200);
    }
    //asset that the user with the role of sales cannot delete an organization
    public function test_sales_person_cannot_edit_organization(): void {
        $user = User::factory()->create();
        $this->artisan( 'db:seed' );
        $user->assignRole( 'sales' );
        $this->actingAs($user);
        Organization::factory()->create(['id' => 1]);
        $response = $this->get('/admin/organizations/1/edit');
        $response->assertStatus(403);
    }
}
