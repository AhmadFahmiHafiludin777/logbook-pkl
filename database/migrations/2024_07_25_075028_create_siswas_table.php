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
            $table->string('nama')->nullable();
            $table->unsignedBigInteger('angkatan_jurusan_sekolah_id');
            $table->unsignedBigInteger('pembimbing_lapangan_id');
            $table->unsignedBigInteger('pembimbing_sekolah_id');
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->foreign('angkatan_jurusan_sekolah_id')->references('id')->on('angkatan_jurusan_sekolahs');
            $table->foreign('pembimbing_lapangan_id')->references('id')->on('pembimbing_lapangans');
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
