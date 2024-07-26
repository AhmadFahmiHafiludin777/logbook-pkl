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
        Schema::create('angkatan_jurusan_sekolahs', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('jurusan_sekolah_id');
            $table->unsignedBigInteger('angkatan_id');
            $table->foreign('jurusan_sekolah_id')->references('id')->on('jurusan_sekolahs');
            $table->foreign('angkatan_id')->references('id')->on('angkatans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angkatan_jurusan_sekolahs');
    }
};
