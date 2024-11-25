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
        Schema::create('infaqs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('waktu');
            $table->decimal('debit', 10, 2);
            $table->decimal('kredit', 10, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->string('bukti')->nullable();
            $table->decimal('saldo_akhir', 10, 2);
            $table->string('status_infaq');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infaqs');
    }
};
