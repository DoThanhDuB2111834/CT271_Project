<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::updateOrCreate([
            'name' => 'Du do',
            'gender' => 'male',
            'birth_date' => Carbon::createFromDate(2003, 11, 11),
            'phone_number' => '0357663765',
            'email' => 'test@example.com',
            'password' => '123456789',
        ]);

        $user1->assignRole('admin');

        $user2 = User::updateOrCreate([
            'name' => 'IU - lee ji eun',
            'gender' => 'female',
            'birth_date' => Carbon::createFromDate(1993, 5, 16),
            'phone_number' => '0357663765',
            'email' => 'mywife@gmail.com',
            'password' => '123456789',
        ]);

        $user2->assignRole('customer');

        $user3 = User::updateOrCreate([
            'name' => 'President',
            'gender' => 'male',
            'birth_date' => Carbon::createFromDate(2003, 11, 11),
            'phone_number' => '0357663765',
            'email' => 'president@example.com',
            'password' => '123456789',
        ]);

        $user3->assignRole('superadmin');
    }
}
