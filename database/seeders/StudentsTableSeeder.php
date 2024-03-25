<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentRecords = [
            ['id'=>1,'name'=>'Yahoo Baba','age'=>20,'gender'=>'M'],
            ['id'=>2,'name'=>'Salman Khan','age'=>23,'gender'=>'M'],
            ['id'=>3,'name'=>'Akshay Kumar','age'=>32,'gender'=>'M'],
            ['id'=>4,'name'=>'Kirti','age'=>27,'gender'=>'F'],
            ['id'=>5,'name'=>'Deepika','age'=>29,'gender'=>'F'],
        ];

        Student::insert($studentRecords);
    }
}
