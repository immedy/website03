<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function JenisInstalasi()
    {
        return $this->belongsTo(instalasi::class,'instalasi','id');
    }
    public function JenisRuangan()
    {
        return $this->belongsTo(ruangan::class,'ruangan','id');
    }
}
