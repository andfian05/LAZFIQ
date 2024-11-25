<?php

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
        Schema::create('qurbans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('kategori_qurban');
            $table->string('jumlah_qurban');
            $table->text('nama_yg_qurban');
            $table->string('bukti')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qurbans');
    }
};
