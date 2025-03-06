<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjung'; // Nama tabel di database

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'keperluan',
        'kritiksaran',
        'kategori',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
