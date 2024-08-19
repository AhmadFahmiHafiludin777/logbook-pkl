<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingSekolah extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'angkatan_jurusan_sekolah_id', 'no_telp'];

    public function angkatanJurusanSekolah(){
        return $this->belongsTo(AngkatanJurusanSekolah::class);
    }

    public function siswa(){
        return $this->hasMany(Siswa::class);
    }

    // public function scopeAngkaSatu($query){
    //     return $query->where('angkatan_jurusan_sekolah_id', 1);
    // }
}
