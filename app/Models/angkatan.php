<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class angkatan extends Model
{
    use HasFactory;
    protected $table = 'angkatan';
    protected $primaryKey = 'id';
    protected $fillable = ['tahun'];
}
