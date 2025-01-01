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
        Schema::create('post_qurbans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pq');
            $table->integer('qurban_sapi');
            $table->integer('qurban_kambing');
            $table->integer('mustahiq_pq');
            $table->string('status_pq');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_qurbans');
    }
};
