<?php

use App\Models\Barang;
use App\Models\Toko;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesan_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Barang::class)->constrained();
            $table->foreignIdFor(Toko::class)->constrained();
            $table->integer('qty');
            $table->boolean('lunas')->default(false);
            $table->boolean('diterima')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_barangs');
    }
};
