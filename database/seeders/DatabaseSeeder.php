<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    if (!User::where('email', 'test@example.com')->exists()) {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }



        // Jalankan seeder poli
        $this->call([
            PoliSeeder::class,
        ]);
    }
}
