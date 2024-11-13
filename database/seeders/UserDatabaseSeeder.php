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
            'name' => 'admin',
            'gender' => 'male',
            'birth_date' => Carbon::createFromDate(2003, 11, 11),
            'phone_number' => '0357663765',
            'email_verified_at' => Carbon::now(),
            'email' => 'admin@gmail.com',
            'password' => '123456789',
        ]);

        $user1->assignRole('admin');

        $user2 = User::updateOrCreate([
            'name' => 'lee ji eun',
            'gender' => 'female',
            'birth_date' => Carbon::createFromDate(1993, 5, 16),
            'phone_number' => '0357663765',
            'email_verified_at' => Carbon::now(),
            'email' => 'jiun@gmail.com',
            'password' => '123456789',
        ]);

        $user2->assignRole('customer');

        $user3 = User::updateOrCreate([
            'name' => 'superadmin',
            'gender' => 'male',
            'birth_date' => Carbon::createFromDate(2003, 11, 11),
            'phone_number' => '0357663765',
            'email_verified_at' => Carbon::now(),
            'email' => 'superadmin@gmail.com',
            'password' => '123456789',
        ]);

        $user3->assignRole('superadmin');
    }
}
