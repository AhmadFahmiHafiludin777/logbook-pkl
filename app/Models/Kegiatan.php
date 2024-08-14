<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    
    protected $fillable = ['deskripsi', 'jadwal_id', 'user_id', 'status'];

    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSudah($query){
        return $query->where('status', 'sudah');
    }

    
}
