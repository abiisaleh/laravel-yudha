<?php

use App\Models\Toko;
use App\Models\User;
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
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('gambar')->nullable();
            $table->text('detail_kerusakan');
            $table->text('hasil_pemeriksaan')->nullable();
            $table->integer('biaya')->nullable();
            $table->boolean('lunas')->default(false);
            $table->boolean('selesai')->default(false);
            $table->integer('rating')->nullable();
            $table->text('comment')->nullable();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Toko::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikans');
    }
};
