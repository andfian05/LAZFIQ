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
        Schema::create('count_qurbans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_cq');
            $table->string('kategori_qurban');
            $table->integer('jumlah_sapi')->nullable()->default(0);
            $table->integer('jumlah_kambing')->nullable()->default(0);
            $table->text('nama_yg_qurban');
            $table->string('bukti_cq')->nullable();
            $table->string('status_cq');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('count_qurbans');
    }
};
