<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    
    protected $fillable = ['kode', 'nama'];

    public function jurusanSekolah(){
        return $this->hasMany(JurusanSekolah::class);
    }

}
