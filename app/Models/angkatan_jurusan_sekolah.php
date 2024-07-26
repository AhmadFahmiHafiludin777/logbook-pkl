<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class angkatan_jurusan_sekolah extends Model
{
    use HasFactory;
    protected $table = 'angkatan_jurusan_sekolah';
    protected $primaryKey = 'id';
    protected $fillable = ['jurusan_sekolah_id', 'angkatan_id'];
}
