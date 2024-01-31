<?php

use App\Models\Perbaikan;
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
        Schema::create('perbaikan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Perbaikan::class)->constrained()->cascadeOnDelete();
            $table->string('perbaikan');
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('total')->virtualAs('qty*harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikan_details');
    }
};
