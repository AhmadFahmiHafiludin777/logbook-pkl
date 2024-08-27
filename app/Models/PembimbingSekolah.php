<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class PembimbingSekolah extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'gender', 'angkatan_jurusan_sekolah_id', 'no_telp'];

    public function angkatanJurusanSekolah(){
        return $this->belongsTo(AngkatanJurusanSekolah::class);
    }

    public function siswa(){
        return $this->hasMany(Siswa::class);
    }

    public function fullname() : Attribute {

        return Attribute::make(
            get: fn () => ($this->gender === 'L' ? 'Bpk. ' : 'Ibu. ') . '' . $this->nama,
        );
        
    }

    public function nama() : Attribute{

        return Attribute::make(
            set: fn ($value) => ucwords(str_replace('_', ' ', $value)),
        );

    }
}
