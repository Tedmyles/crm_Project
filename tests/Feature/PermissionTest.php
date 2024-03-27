<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase {
    use HandlesAuthorization;
    use RefreshDatabase;

    public function test_sales_person_can_create_permission(): void {
        //first do a migration of the users table
        $this->artisan( 'migrate' );
        $user = User::factory()->create();
        //seed the roles and permissions
        $this->artisan( 'db:seed' );
        $user->assignRole( 'sales' );
        //assert  that role exists
        $this->assertTrue( $user->hasRole( 'sales' ) );
        $this->assertFalse( $user->can( 'create-permission' ) );
        

    }
//test super_admin can create permission
    public function test_super_admin_can_create_permission(): void {
        $user = User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'test@admin.com',
            'password' => Hash::make('password'),
        ]);
        $this->artisan( 'db:seed' );
        $user->assignRole( 'super-admin' );
        $this->actingAs($user);
        $response = $this->get('/admin/permissions');
        $response->assertStatus(200);
    }
    public function test_admin_can_update_permission(): void {
        $user = User::factory()->create();
        $this->artisan( 'db:seed' );
        $user->assignRole( 'admin' );
        $this->assertTrue( $user->hasRole( 'admin' ) );
        $this->assertFalse( $user->can( 'update-permission' ) );
    }

}
