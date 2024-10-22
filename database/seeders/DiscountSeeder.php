<?php

namespace Database\Seeders;

use App\Models\discount;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Discounts = [
            ['description' => 'Sale đầu tháng', 'percentage' => 0.2, 'startedDate' => Carbon::now(), 'endedDate' => Carbon::createFromDate(2024, 11, 10)],
        ];

        foreach ($Discounts as $discount) {
            discount::updateOrCreate($discount);
        }
    }
}
