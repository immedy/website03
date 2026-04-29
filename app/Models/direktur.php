<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direktur extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getFormatPeriodeAwalAttribute()
    {
        $schedule_date = Carbon::parse($this->attributes['awal_periode']);
        return $schedule_date->isoFormat('MMMM Y');
    }

    public function getFormatPeriodeAkhirAttribute()
    {
        $schedule_date = Carbon::parse($this->attributes['akhir_periode']);
        return $schedule_date->isoFormat('MMMM Y');
    }
}
