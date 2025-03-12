<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use App\Livewire\Login;

class UserAuthTest extends TestCase
{
    use RefreshDatabase; 

    public function test_super_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'super@example.com',
            'password' => Hash::make('password123'),
            'role' => 'super',
        ]);

        Livewire::test(Login::class)
            ->set('email', 'super@example.com')
            ->set('password', 'password123')
            ->call('login')
            ->assertRedirect('/super/dashboard');

        $this->assertAuthenticatedAs($user, 'web');
    }

    public function test_admin_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        Livewire::test(Login::class)
            ->set('email', 'admin@example.com')
            ->set('password', 'password123')
            ->call('login')
            ->assertRedirect('/admin/dashboard');

        $this->assertAuthenticatedAs($user, 'web');
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        Livewire::test(Login::class)
            ->set('email', 'user@example.com')
            ->set('password', 'wrongpassword')
            ->call('login')
            ->assertHasErrors(['email']); // ✅ Fix: Ensure Livewire validation errors are checked
    
        $this->assertGuest();
    }
}