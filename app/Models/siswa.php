<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'angkatan_jurusan_sekolah_id', 'pembimbing_lapangan_id', 'pembimbing_sekolah_id', 'alamat', 'no_telp','email'];
   
    public function angkatan_jurusan_sekolah()
    {
        return $this->belongsTo(AngkatanJurusanSekolah::class);

    }

    public function pembimbing_lapangan(){
        return $this->belongsTo(PembimbingLapangan::class);
    }

    public function pembimbing_sekolah(){
        return $this->belongsTo(PembimbingSekolah::class);
    }
    

}
