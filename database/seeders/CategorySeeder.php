<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('category')->insert([
        //     'name' => Str::random(10),
        // ]);
        $categories = [
            ['name' => 'Giường'],
            ['name' => 'Phòng ngủ'],
            ['name' => 'Phòng ăn'],
            ['name' => 'Phòng làm việc'],
            ['name' => 'Tranh trang trí'],
            ['name' => 'Kệ trưng bày'],
            ['name' => 'Bàn ăn'],
            ['name' => 'Ghế ăn'],
            ['name' => 'Bàn làm việc'],
        ];
        foreach ($categories as $category) {
            category::updateOrCreate($category);
        }
    }
}
