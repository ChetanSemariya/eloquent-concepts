<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRecords = [
            ['id'=>1,'name'=>'chetan','email'=>'chetan@gmail.com','age'=>20,'city'=>'ujjain'],
            ['id'=>2,'name'=>'pawan','email'=>'pawan@gmail.com','age'=>27,'city'=>'indore'],
            ['id'=>3,'name'=>'harsh','email'=>'harsh@gmail.com','age'=>29,'city'=>'bhopal'],
            ['id'=>4,'name'=>'arun','email'=>'arun@gmail.com','age'=>19,'city'=>'gwalior'],
            ['id'=>5,'name'=>'shubham','email'=>'shubham@gmail.com','age'=>32,'city'=>'aron'],
            ['id'=>6,'name'=>'karan','email'=>'karan@gmail.com','age'=>34,'city'=>'indore'],
            ['id'=>7,'name'=>'ankit','email'=>'ankit@gmail.com','age'=>39,'city'=>'dewas'],
            ['id'=>8,'name'=>'saurav','email'=>'saurav@gmail.com','age'=>21,'city'=>'indore'],
            ['id'=>9,'name'=>'nayan','email'=>'nayan@gmail.com','age'=>23,'city'=>'ujjain'],
            ['id'=>10,'name'=>'sunita','email'=>'sunita@gmail.com','age'=>15,'city'=>'guna'],
        ];

        User::insert($userRecords);
    }
}
