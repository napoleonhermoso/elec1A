<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    //
    protected $fillable = [
    "employeeid",
    "fname",
    "middlename",
    "lastname"
    ];
}
