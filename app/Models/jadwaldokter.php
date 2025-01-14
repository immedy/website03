<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwaldokter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function NamaDokter()
    {
        return $this->hasOne(dokter::class,'id','dokter_id');
    }

    public function getFormatTanggalDariAttribute()
    {
        $schedule_date = Carbon::parse($this->attributes['dari']);
        return $schedule_date->isoFormat('D MMMM Y');
    }

    public function getFormatTanggalSampaiAttribute()
    {
        $schedule_date = Carbon::parse($this->attributes['sampai']);
        return $schedule_date->isoFormat('D MMMM Y');
    }
}
