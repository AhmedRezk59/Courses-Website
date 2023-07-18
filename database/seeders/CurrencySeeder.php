<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'name' => 'ريال سعودى',
            'code' => 'SAR',
            'rate' => 3.75
        ]);
        Currency::create([
            'name' => 'جنيه مصرى',
            'code' => 'EGP',
            'rate' => 31
        ]);
        Currency::create([
            'name' => 'دولار أمريكى',
            'code' => 'USD',
            'rate' => 1
        ]);
    }
}
