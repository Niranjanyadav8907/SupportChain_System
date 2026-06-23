<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed basic departments and roles needed for auth flow tests
        Department::create(['name' => 'IT Support', 'description' => 'IT Support Department']);
        Role::create(['name' => 'Employee', 'description' => 'Employee Role']);
    }

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $department = Department::first();
        $role = Role::first();

        $response = $this->post('/register', [
            'name' => 'Test Employee',
            'email' => 'test@supportchain.com',
            'employee_id' => 'EMP-TEST001',
            'password' => 'password',
            'password_confirmation' => 'password',
            'department_id' => $department->id,
            'role_id' => $role->id,
            'phone' => '+15550199',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test Employee',
            'email' => 'test@supportchain.com',
            'employee_id' => 'EMP-TEST001',
            'role_id' => $role->id,
            'department_id' => $department->id,
            'phone' => '+15550199',
            'status' => 'active',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $department = Department::first();
        $role = Role::first();

        $user = User::create([
            'name' => 'Test Employee',
            'email' => 'test@supportchain.com',
            'employee_id' => 'EMP-TEST001',
            'password' => bcrypt('password'),
            'department_id' => $department->id,
            'role_id' => $role->id,
            'phone' => '+15550199',
            'status' => 'active',
        ]);

        $response = $this->post('/login', [
            'email' => 'test@supportchain.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/dashboard');
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $department = Department::first();
        $role = Role::first();

        User::create([
            'name' => 'Test Employee',
            'email' => 'test@supportchain.com',
            'employee_id' => 'EMP-TEST001',
            'password' => bcrypt('password'),
            'department_id' => $department->id,
            'role_id' => $role->id,
            'status' => 'active',
        ]);

        $response = $this->post('/login', [
            'email' => 'test@supportchain.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
