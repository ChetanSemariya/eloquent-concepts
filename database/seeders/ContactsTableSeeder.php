<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contactRecords = [
            ['id'=>1,'student_id'=>1, 'email'=>'yahoobaba@gmail.com','phone'=>9770807098,'address'=>'YB road','city'=>'Chandigarh'],
            ['id'=>2,'student_id'=>2, 'email'=>'salman@gmail.com','phone'=>6987807098,'address'=>'YB road','city'=>'mumbai'],
            ['id'=>3,'student_id'=>3, 'email'=>'akshay@gmail.com','phone'=>42568798,'address'=>'YB road','city'=>'pune'],
            ['id'=>4,'student_id'=>4, 'email'=>'kirti@gmail.com','phone'=>325874098,'address'=>'YB road','city'=>'delhi'],
            ['id'=>5,'student_id'=>5, 'email'=>'Deepika@gmail.com','phone'=>874807098,'address'=>'YB road','city'=>'banglore'],
        ];

        Contact::insert($contactRecords);
    }
}
