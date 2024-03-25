<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelConvention extends Model
{
    use HasFactory;

    // protected $table = 'users_data'; by default laravel naming convention follow krta hai i.e table ka name plural mai hai to uska model always singular form mai hi hoga but agar hum kuch or name rakhna chahte hai humare table ka to uske liye hume model convention ka use krna hota hai and isme access modifier protected ka use compulsory hota hai.

    /* ------------ Agar primary key ko rename krna chahte hai to -------- */
    protected $primaryKey = "user_id";

    /* ------ Agar primarykey ki datatype integer nahi rakhni kuch or rakhni hai to iss tarah se krskte hai  --- */
    public $incrementing = false;
    protected $keyType = 'string'; // string datatype assigned to our primary key

    /* ---- Agar created_at and updated_at ka use nahi krna hoto iss tarah se likhna pdega --- */
    public $timestamps = false;

    /* ---- Date format ko change krne k liye iss tarah se likhte hai ---- */
    protected $dateFormat = 'U';

    /* ---- CREATED AT AND UPDATED AT KA RENAME KRNA HOTO ---- */
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

    /* ---- Agar kisi column ki default value set krna hoto ---- */
    protected $attributes = [
        'age' => 18,
        'city' => 'Goa'
    ];

    /* ---- Particular model k liye koi or database use krna hoto uske liye hum iss tarah se define krte hai ---- */
    protected $connection = 'sqlite'; // poore website mai mysql chalega or iss particular k liye sqlite 

    /* --- Agar hum chahte hai ki humari primary key mai integer save na ho koi random number save ho to uske liye hum iss tarah se define krenge . ISKA USE TABHI KRNA HAI JAB HUM HUMARE PRIMARY KEY KI DATATYPE INTEGER NAHI RAKHENGE STRING RAKHENGE --- */
    use HasUuids; // random number of 36 character is stored
    use HasUlids; // 26 character long

    /* 1). In any database table primary key col should be named ID and its datatype is integer and it must be auto-incremented.
    2). Created_at and updated_at are neccessary columns and its format will be timestamp.  */
}
