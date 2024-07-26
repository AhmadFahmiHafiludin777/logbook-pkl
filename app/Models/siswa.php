<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'angkatan_jurusan_sekolah_id', 'pembimbing_lap_id', 'pembimbing_sekolah_id', 'alamat', 'no_telp','email'];

}
