<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    // make one to one relationship with contacts table
    public function contact(){
        return $this->hasOne(Contact::class);
    }

    /* --- Define one to many relationship with books */
    public function book(){
        return $this->hasMany(Book::class);

        /* -- SYNTAX FOR THIS RELATIONSHIP -- */
        // return $this->hasMany(Book::class, 'foreign_key','local_key');
    }
}
