<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function produk_dagang(): HasOne
    {
        return $this->hasOne(ProdukDagang::class, 'id', 'produk_dagang_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
