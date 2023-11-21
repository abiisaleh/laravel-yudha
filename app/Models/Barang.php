<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
}
