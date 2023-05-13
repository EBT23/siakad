<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMapel extends Model
{
    use HasFactory;

    protected $table = 'jadwal_mapel';
    
    protected $fillable = [
        'id',
        'id_kelas', 
        'id_mapel', 
        'id_semester',
        'id_thn_ajaran',
        'hari',
        'dari',
        'sampai',
    ];
}
