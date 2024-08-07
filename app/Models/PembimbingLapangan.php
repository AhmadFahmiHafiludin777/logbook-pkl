<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PembimbingLapangan extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'angkatan_jurusan_sekolah_id', 'no_telp'];

    public function angkatanJurusanSekolah(){
        return $this->belongsTo(AngkatanJurusanSekolah::class);
    }
    public function siswa():HasMany
    {
        return $this->hasMany(Siswa::class);
    }

}
