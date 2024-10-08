<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'no_telp', 'alamat'];

    public function jurusanSekolah()
    {
        return $this->hasMany(JurusanSekolah::class);
    }

    
}
