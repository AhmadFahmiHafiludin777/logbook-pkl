<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $fillable = ['deskripsi', 'jadwal_id', 'user_id', 'status'];

}
