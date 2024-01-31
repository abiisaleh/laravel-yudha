<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerbaikanDetail extends Model
{
    use HasFactory;

    protected $appends = ['jumlah'];

    public function getJumlahAttribute()
    {
        return $this->qty * $this->harga;
    }

    public function perbaikan(): BelongsTo
    {
        return $this->belongsTo(Perbaikan::class);
    }
}
