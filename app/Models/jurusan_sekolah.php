<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan_sekolah extends Model
{
    use HasFactory;
    protected $table = 'jurusan_sekolah';
    protected $primaryKey = 'id';
    protected $fillable = ['sekolah_id', 'jurusan_id'];
}
