<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory(10)->create([
            'name' => 'Abderrahman Haouate'
        ]);

        Compaign::factory(50)->create([
            'user_id' => $user->id
        ]);
    }
}
