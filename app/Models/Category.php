<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //memasukkan seluruh data ke model
    protected $guarded = [
        'id', //id tidak dimasukkan
    ];
}
