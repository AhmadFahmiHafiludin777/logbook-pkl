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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id('id');
            $table->text('deskripsi');
            $table->unsignedBigInteger('jadwal_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['sudah', 'belum']);
            $table->foreign('jadwal_id')->references('id')->on('jadwals');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
