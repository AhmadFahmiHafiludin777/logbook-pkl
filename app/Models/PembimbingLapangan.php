<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PembimbingLapangan extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'no_telp'];

    public function siswa():HasMany
    {
        return $this->hasMany(Siswa::class);
    }

}
