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
        Schema::create('post_zakats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pz');
            $table->decimal('zakat_uang', 10, 2);
            $table->float('zakat_beras');
            $table->integer('mustahiq_pz');
            $table->string('status_pz');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_zakats');
    }
};
