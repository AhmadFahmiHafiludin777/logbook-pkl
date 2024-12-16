<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'no_telp', 'alamat'];

    public function jurusan()
    {
        return $this->belongsToMany(Jurusan::class, 'jurusan_sekolahs', 'sekolah_id', 'jurusan_id')->withTimestamps();
    }

    public function jurusanSekolah()
    {
        return $this->hasMany(JurusanSekolah::class);
    }

    public function angkatanJurusanSekolah() {
        return $this->belongsToMany(Angkatan::class, 'angkatan_jurusan_sekolahs', 'jurusan_sekolah_id', 'angkatan_id')->withTimestamps();
    }


    
}
