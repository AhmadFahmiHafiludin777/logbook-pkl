<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'tanggal', 'angkatan_jurusan_sekolah_id'];

}
