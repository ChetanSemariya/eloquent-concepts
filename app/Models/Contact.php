<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = [];

    // define inverse relationship with students table 
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
