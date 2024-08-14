<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanSekolah extends Model
{
    use HasFactory;
   
    protected $fillable = ['sekolah_id', 'jurusan_id'];

    public function sekolah(){
        return $this->belongsTo(Sekolah::class);
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }

    public function angkatanJurusanSekolah()
    {
        return $this->hasMany(AngkatanJurusanSekolah::class);
    }

    
}
