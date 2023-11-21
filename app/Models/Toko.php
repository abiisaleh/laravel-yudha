<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Toko extends Model implements HasName
{
    use HasFactory;

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function barangs(): HasMany
    {
        return $this->hasMany(Barang::class);
    }

    public function perbaikans(): HasMany
    {
        return $this->hasMany(Perbaikan::class);
    }

    public function getFilamentName(): string
    {
        return "{$this->nama}";
    }

    protected static function booted(): void
    {
        // if (auth()->check()) {
        //     if (auth()->user()->role == 'teknisi') {
        //         static::addGlobalScope('toko', function (Builder $query) {
        //             $query->whereHas('user', fn ($query) => $query->where('role', 'distributor'));
        //         });
        //     }
        // }
    }
}
