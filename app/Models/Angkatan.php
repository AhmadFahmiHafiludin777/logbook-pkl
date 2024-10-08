<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;
    
    protected $fillable = ['tahun'];

    public function angkatanJurusanSekolah() {
        return $this->hasMany(AngkatanJurusanSekolah::class);
    }

}
