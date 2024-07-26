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
        Schema::create('jurusan_sekolahs', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('sekolah_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->foreign('sekolah_id')->references('id')->on('sekolahs');
            $table->foreign('jurusan_id')->references('id')->on('jurusans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan_sekolahs');
    }
};
