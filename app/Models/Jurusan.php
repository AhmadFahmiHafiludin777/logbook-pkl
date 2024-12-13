<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    
    protected $fillable = ['kode', 'nama'];

    public function sekolah(){
        return $this->belongsToMany(Sekolah::class, 'jurusan_sekolahs', 'jurusan_id', 'sekolah_id')->withTimestamps();
    }

    public function jurusanSekolah(){
        return $this->hasMany(JurusanSekolah::class);
    }


}
