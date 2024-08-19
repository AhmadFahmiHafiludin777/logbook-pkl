<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'angkatan_jurusan_sekolah_id', 'pembimbing_lapangan_id', 'pembimbing_sekolah_id', 'alamat', 'no_telp','email'];
   
    // protected $with = ['pembimbingLapangan'];
    public function angkatanJurusanSekolah()
    {
        return $this->belongsTo(AngkatanJurusanSekolah::class);

    }

    public function pembimbingLapangan(){
        return $this->belongsTo(PembimbingLapangan::class);
    }

    public function pembimbingSekolah(){
        return $this->belongsTo(PembimbingSekolah::class);
    }

    // public function getFullNameAttribute(){
    //     return $this->first_name . '' . $this->last_name;
    // }

    

}
