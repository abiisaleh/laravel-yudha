<?php

use App\Models\Alamat;
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
        Schema::create('tokos', function (Blueprbint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar')->nullable();
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->text('alamat');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokos');
    }
};
