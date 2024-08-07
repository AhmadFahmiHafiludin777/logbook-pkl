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
}
