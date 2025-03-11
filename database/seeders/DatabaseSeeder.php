<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Jon Doe',
            'email' => 'jon@gmail.com',
            'password' => Hash::make('123'),
            'status' => 1,
            'role' => 'super',
        ]);

        User::create([
            'name' => 'Mike Tyson',
            'email' => 'mike@gmail.com',
            'password' => Hash::make('123'),
            'status' => 1,
            'role' => 'admin',
        ]);
    }
}
