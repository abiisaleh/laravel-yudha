<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesanBarang extends Model
{
    use HasFactory;

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
}
