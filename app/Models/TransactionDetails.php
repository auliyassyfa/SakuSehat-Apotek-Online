<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetails extends Model
{
    use HasFactory;

    //memasukkan seluruh data ke model
    protected $guarded = [
        'id', //id tidak dimasukkan
    ];

    // mengetahui detail produk
    public function productTransaction(){
        return $this->BelongsTo(ProductTransaction::class);
    }

    // mengetahui detail produk
    public function product(){
        return $this->BelongsTo(Product::class);
    }
}
