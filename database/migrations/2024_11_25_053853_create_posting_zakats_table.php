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
        Schema::create('posting_zakats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->decimal('zakat_uang', 10, 2);
            $table->float('zakat_beras');
            $table->integer('mustahiq');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting_zakats');
    }
};
