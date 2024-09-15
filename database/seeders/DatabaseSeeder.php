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

        $user1 = User::create([
            'name' => 'Du do',
            'gender' => 'male',
            'birth_date' => Carbon::createFromDate(2003,11,11),
            'phone_number' => '0357663765',
            'email' => 'test@example.com',
            'password' => '123456789',
        ]);

        $user1->admin()->create(['role' => 'Director']);

        $user2 = User::create([
            'name' => 'IU - lee ji eun',
            'gender' => 'female',
            'birth_date' => Carbon::createFromDate(1993,5,16),
            'phone_number' => '0357663765',
            'email' => 'IU@queen.com',
            'password' => '123456789',
        ]);

        $user2->customer()->create([
            'address' => 'seoul'
        ]);
    }
}
