<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dokter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function referensi():BelongsTo
    {
        return $this->belongsTo(referensi::class,'spesialis');
    }

    public function JadwalDokter()
    {
        return $this->belongsTo(jadwaldokter::class,'id','dokter_id');
    }
}
