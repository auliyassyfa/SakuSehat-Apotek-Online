<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    use HasFactory;

    //memasukkan seluruh data ke model
    protected $guarded = [
        'id', //id tidak dimasukkan
    ];

    // mengetahui user pembeli
    public function user(){
        return $this->belongsTo(User::class);
    }

    // melihat banyak produk yg dibeli
    public function transactionDetails(){
        return $this->hasMany(TransactionDetails::class);
    }
}
