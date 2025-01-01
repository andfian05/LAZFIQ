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
        Schema::create('count_infaqs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_ci');
            $table->time('waktu_ci');
            $table->decimal('debit_ci', 13, 2);
            $table->decimal('kredit_ci', 13, 2)->nullable()->default('0');
            $table->text('keterangan_ci')->nullable();
            $table->string('bukti_ci')->nullable();
            $table->decimal('saldo_akhir_ci', 13, 2);
            $table->string('status_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('count_infaqs');
    }
};
