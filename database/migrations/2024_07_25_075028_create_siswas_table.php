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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama');
            $table->unsignedBigInteger('angkatan_jurusan_sekolah_id');
            $table->unsignedBigInteger('pembimbing_lap_id');
            $table->unsignedBigInteger('pembimbing_sekolah_id');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->foreign('angkatan_jurusan_sekolah_id')->references('id')->on('angkatan_jurusan_sekolahs');
            $table->foreign('pembimbing_lap_id')->references('id')->on('pembimbing_laps');
            $table->foreign('pembimbing_sekolah_id')->references('id')->on('pembimbing_sekolahs');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
