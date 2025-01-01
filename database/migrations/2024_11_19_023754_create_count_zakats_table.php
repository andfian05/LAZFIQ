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
        Schema::create('count_zakats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_cz');
            $table->time('waktu_cz');
            $table->string('muzakki_pertama');
            $table->text('keluarga_muzakki');
            $table->string('jenis_zakat');
            $table->float('zakat_beras')->nullable();
            $table->decimal('zakat_uang', 10, 2)->nullable();
            $table->string('status_cz');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('count_zakats');
    }
};
