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
        Schema::create('posting_qurbans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('qurban_sapi');
            $table->integer('qurban_kambing');
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
        Schema::dropIfExists('posting_qurbans');
    }
};
