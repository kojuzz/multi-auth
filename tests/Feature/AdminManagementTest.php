<?php

namespace Tests\Feature;

use App\Livewire\Auth\Profile;
use App\Livewire\Super\AddUser;
use App\Livewire\Super\EditUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class AdminManagementTest extends TestCase
{
    use RefreshDatabase; // Database ကို သန်သန်သပ်သပ် စမ်းဖို့

    public function test_super_user_can_add_an_admin()
    {
        // Super User တစ်ယောက် ဖန်တီးမယ်
        $superUser = User::factory()->createOne([
            'email' => 'super@example.com',
            'password' => Hash::make('password123'),
            'role' => 'super',
        ]);

        // Super User အနေနဲ့ Login ဝင်ပြီး 
        $superUser = User::find($superUser->id);
        $this->actingAs($superUser);

        // Admin ဖန်တီးမယ်
        Livewire::test(AddUser::class)
            ->set('name', 'New Admin')
            ->set('email', 'admin@example.com')
            ->set('password', 'password123')
            ->set('role', 'admin')
            ->call('store')
            ->assertStatus(200);

        // Database ထဲမှာ Admin အသစ်ရှိမရှိစစ်မယ်
        $this->assertDatabaseHas('users', [
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);
    }
    
    public function test_super_user_can_change_admin_password() 
    {
        // Super user အနေနဲ့ Login ဝင်ပြီး
        $superUser = User::factory()->create(['role' => 'super']);
        $admin = User::factory()->create(['role' => 'admin', 'password' => Hash::make('oldpassword')]);

        // ✅ Fix: Pass `id` when testing EditUser component
        Livewire::test(EditUser::class, ['id' => $admin->id]) // ✅ Pass admin ID here
            ->set('new_password', 'newpassword')
            ->set('password_confirmation', 'newpassword')
            ->call('change')
            ->assertStatus(200);

        $this->assertTrue(Hash::check('newpassword', $admin->fresh()->password));
    }

    public function test_super_user_can_toggle_admin_status()
    {
        $superUser = User::factory()->create(['role' => 'super']);
        $admin = User::factory()->create(['role' => 'admin', 'status' => 1]); // ✅ Start as Active (1)
        $this->actingAs(User::find($superUser->id));
        // $this->actingAs($superUser);

        // ✅ First Call: Expect 1 → 0
        Livewire::test(EditUser::class, ['id' => $admin->id])
            ->call('status')
            ->assertStatus(200);

        $this->assertEquals(0, $admin->fresh()->status); // ✅ Ensure status is now 0

        // ✅ Second Call: Expect 0 → 1
        Livewire::test(EditUser::class, ['id' => $admin->id])
            ->call('status')
            ->assertStatus(200);

        $this->assertEquals(1, $admin->fresh()->status); // ✅ Ensure status is now 1
    }

    public function test_admin_cannot_add_another_admin_or_super_user()
    {
        // Super user အနေနဲ့ Login ဝင်ပြီး
        $admin = User::factory()->create(['role' => 'admin']);        
        $this->actingAs(User::find($admin->id));
        // $this->actingAs($admin);

        Livewire::test(AddUser::class)
            ->set('name', 'Unauthorized Admin')
            ->set('email', 'unauthorized@example.com')
            ->set('password', 'password123')
            ->set('role', 'admin')
            ->call('store')
            ->assertForbidden();

        $this->assertDatabaseMissing('users', [
            'email' => 'unauthorized@example.com',
        ]);
    }


}