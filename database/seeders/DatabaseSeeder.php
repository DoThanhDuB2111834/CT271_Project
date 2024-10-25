<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $user = User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => '123456789',
        // ]);

        $this->call([
            RoleDatabaseSeeder::class,
            UserDatabaseSeeder::class,
            ProductSeeder::class,
            DiscountSeeder::class,
        ]);
    }
}
