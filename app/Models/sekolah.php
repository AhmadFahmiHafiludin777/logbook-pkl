<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'email', 'no_telp', 'alamat'];
}
