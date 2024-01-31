<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perbaikan extends Model
{
    use HasFactory;

    protected $appends = ['biaya'];

    public function getBiayaAttribute()
    {
        return $this->detail()->sum('total');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }

    public function detail(): HasMany
    {
        return $this->hasMany(PerbaikanDetail::class);
    }
}
