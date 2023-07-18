<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(50)->create();

        User::create([
            'first_name' => 'Ahmed',
            'last_name' => 'Rizk',
            'phone_number' => '01010248971',
            'email' => 'a@a.com',
            'password' => Hash::make(12345678)
        ]);
        $admin = Admin::create([
            'name' => 'Ahmed',
            'email' => 'a@a.com',
            'password' => Hash::make(12345678)
        ]);
        $admin->markEmailAsVerified();
         $instructor = Instructor::create([
            'name' => 'Ahmed Rizk',
            'email' => 'a@a.com',
            'job' => 'General Manager at Milestone Training Center',
            'description' => 'PfMP,PgMP, PMP, PMI-RMP, PMI-SP, Project +, MPM, CIPM,PRINCE2 Practitioner, MSP Practitioner,M_o_R Practitioner, P3O Practitioner, MoP Practitioner.',
            'gender' => 'ذكر',
            'avatar' => 'IG3ncQ2b4JGRBfJuYYYZ1ns92d7Mxlr6NLyT2vZ6.jpg',
            'country' => 'مصر',
            'password' => Hash::make(12345678)
        ]);
        $instructor->markEmailAsVerified();

        $this->call([
            DepartmentSeeder::class,
            CurrencySeeder::class,
            CourseSeeder::class
        ]);
        // DB::table('website_settings')->insert([
        //     'contact_mail' => 'rezk59315@gmail.com'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
