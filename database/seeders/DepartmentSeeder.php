<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'علوم الحاسب والرّقمنة'
        ]);
        Department::create([
            'name' => 'الاقتصاد والإدارة والتسويق'
        ]); 
        Department::create([
            'name' => 'الآداب واللغة العربية'
        ]);

    }
}
