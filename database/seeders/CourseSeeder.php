<?php

namespace Database\Seeders;

use App\Enums\CourseStatus;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'إدارة المشاريع الإحترافية (Project Management Professional (PMP',
            'department_id' => 1,
            'trailer' => 'AslxKkGFey1XaCX1Qb7LXgNxdSaBoEtSiG8RKM9a.mkv',
            'thumbinal' => '0CHyKyISxGQ1ZIFBQhbp0S4yfjusU0ctXU1qrmXt.jpg',
            'description' => 'sad',
            'references' => 'sd',
            'outputs' => 'sd',
            'curriculum' => 'sd',
            'target_audience' => 'sd',
            'is_paid' => false,
            'price' => 500,
            'discount_price' => 400,
            'end_discount_date' => '2023-07-22',
            'start_date' => '2023-07-10',
            'end_date' => '2023-07-22',
            'instructor_id' => 1,
            'status' => CourseStatus::ACCEPTED->value,
        ]);
        
        Course::create([
            'name' => 'إدارة المشاريع الإحترافية (Project Management Professional (PMP',
            'department_id' => 1,
            'trailer' => 'hSsMajrxWZ4OXWq6a32rybYvD8KrCzfekFkaoVF0.mkv',
            'thumbinal' => 'O5hvy3zZd4kiJENsiEpYexF68cszeUqsHij16nqq.jpg',
            'description' => 'sad',
            'references' => 'sd',
            'outputs' => 'sd',
            'curriculum' => 'sd',
            'target_audience' => 'sd',
            'is_paid' => true,
            'price' => 500,
            'discount_price' => 400,
            'end_discount_date' => '2023-07-22',
            'start_date' => '2023-07-10',
            'end_date' => '2023-07-22',
            'instructor_id' => 1,
            'status' => CourseStatus::ACCEPTED->value,
        ]);

        // DB::table('course_user')->insert([
        //     'user_id' =>1,
        //     'course_id' =>1,
        // ]);
        // DB::table('course_user')->insert([
        //     'user_id' =>1,
        //     'course_id' =>2,
        // ]);
      
    }
}
