<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingLapangan extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'angkatan_jurusan_sekolah_id', 'no_telp'];

    public function angkatan_jurusan_sekolah(){
        return $this->belongsTo(AngkatanJurusanSekolah::class);
    }

}
