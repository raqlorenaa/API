<?php

namespace Database\Seeders;

use App\Models\Eventos;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the users table
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // Certifique-se de definir uma senha segura
                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
            ]
        );

        // Seed the eventos table with 20 random records
        Eventos::factory()->count(20)->create([
            'user_id' => $user->id
        ]);
    }
}

