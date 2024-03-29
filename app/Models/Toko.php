<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Toko extends Model implements HasName
{
    use HasFactory;

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
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

    public function scopeKecamatan($query, $kecamatan)
    {
        return $query->where('jenis', 'teknisi')->where('kecamatan', $kecamatan);
    }

    public function scopeVerified($query)
    {
        return $query->whereHas('user', fn (Builder $query) => $query->where('verified', true));
    }
}
