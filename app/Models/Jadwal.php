<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'tanggal', 'angkatan_jurusan_sekolah_id'];

    public function angkatanJurusanSekolah(){
        return $this->belongsTo(AngkatanJurusanSekolah::class);
    }

    public function kegiatan(){
        return $this->hasMany(Kegiatan::class);
    }

}
