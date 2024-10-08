<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AngkatanJurusanSekolah extends Model
{
    use HasFactory;
    
    protected $fillable = ['jurusan_sekolah_id', 'angkatan_id'];

    public function jurusanSekolah(){
        return $this->belongsTo(JurusanSekolah::class);
    }

    public function angkatan(){
        return $this->belongsTo(Angkatan::class);
    }

    public function siswa(){
        return $this->hasMany(Siswa::class);
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

    public function pembimbingSekolah(){
        return $this->hasMany(PembimbingSekolah::class);
    }

    public function pembimbingLapangan(){
        return $this->hasMany(PembimbingLapangan::class);
    }

}
