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
        Schema::create('posting_infaqs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->decimal('debit', 10, 2);
            $table->decimal('kredit', 10, 2)->nullable();
            $table->decimal('saldo_akhir', 10, 2)->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting_infaqs');
    }
};
