<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenangananPengaduan extends Model
{
    use HasFactory;

    protected $table = 'penanganan_pengaduans';

    protected $fillable = [
        'deskripsi',
        'gambar',
    ];
}
