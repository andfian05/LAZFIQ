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
        Schema::create('post_infaqs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pi');
            $table->decimal('debit_pi', 10, 2);
            $table->decimal('kredit_pi', 10, 2)->nullable();
            $table->decimal('saldo_akhir_pi', 10, 2)->nullable();
            $table->string('status_pi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_infaqs');
    }
};
