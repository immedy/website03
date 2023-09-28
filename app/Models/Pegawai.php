<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function scopeFilter($query)
    {
        if (request('caripegawai')){
            $query->where('nip','like',''.request('caripegawai').'')
                    ->orWhere('nama','like','%'.request('caripegawai').'%');
        }
    }
    
    public function ReferensiRuangan()
    {
        return $this->belongsTo(referensi::class,'ruangan');
    }
    public function user()
    {
        return $this->hasOne(User::class,'pegawai_id','id');
    }
}