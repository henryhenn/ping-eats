<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProdukDagang extends Model
{
    use HasFactory;

    public function scopeSearch($query, $search)
    {
        $query->when($search ?? null, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });
    }

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $table = 'produk_dagang';

    public function transaksi(): HasOne
    {
        return $this->hasOne(Transaksi::class, 'produk_dagang_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
