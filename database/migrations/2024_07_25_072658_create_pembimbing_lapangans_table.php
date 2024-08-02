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
        Schema::create('pembimbing_lapangans', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama')->nullable();
            $table->unsignedBigInteger('angkatan_jurusan_sekolah_id');
            $table->string('no_telp')->nullable();
            $table->foreign('angkatan_jurusan_sekolah_id')->references('id')->on('angkatan_jurusan_sekolahs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembimbing_lapangans');
    }
};
