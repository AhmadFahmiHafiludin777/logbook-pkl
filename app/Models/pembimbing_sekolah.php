<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembimbing_sekolah extends Model
{
    use HasFactory;
    protected $table = 'pembimbing_sekolah';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'angkatan_jurusan_sekolah_id', 'no_telp'];
}
