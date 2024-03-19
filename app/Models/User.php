<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "users";

    // sari value ko save karane k liye iska use hota hai and agar hume koi value save nahi karani hai to use hum guarded k andar define krdenge
    // protected $guarded = [];

    /* --- iske andar all field ka name likhna compulsory hai jinhe aap save karana chahte hai  */
    protected $fillable = [
        'name','email','age','city'
    ];
}
