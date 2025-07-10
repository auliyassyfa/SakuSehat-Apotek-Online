<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    //memasukkan seluruh data ke model
    protected $guarded = [
        'id', //id tidak dimasukkan
    ];

    // ambil data product
    public function product(){
        return $this->belongsTo(Product::class);
    }
    // pengguna saat ini
    public function user(){
        return $this->belongsTo(User::class);
    }

}
