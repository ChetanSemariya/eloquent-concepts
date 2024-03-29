<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookRecords = [
            ['id'=>1,'title'=>'New Book One','description'=>'Lorem ipsum is simply dummy text','student_id'=>1],
            ['id'=>2,'title'=>'New Book Two','description'=>'Lorem ipsum is simply dummy text','student_id'=>2],
            ['id'=>3,'title'=>'New Book Three','description'=>'Lorem ipsum is simply dummy text','student_id'=>1],
            ['id'=>4,'title'=>'New Book Four','description'=>'Lorem ipsum is simply dummy text','student_id'=>3],
            ['id'=>5,'title'=>'New Book Five','description'=>'Lorem ipsum is simply dummy text','student_id'=>3],
            ['id'=>6,'title'=>'New Book Six','description'=>'Lorem ipsum is simply dummy text','student_id'=>2],
        ];

        Book::insert($bookRecords);
    }
}
