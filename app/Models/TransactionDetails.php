<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetails extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    // mengetahui transaksi induknya
    public function productTransaction(): BelongsTo
    {
        return $this->belongsTo(ProductTransaction::class);
    }

    // mengetahui produk terkait
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
