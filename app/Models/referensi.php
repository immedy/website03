<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class referensi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;
    public function JenisReferensi():BelongsTo
    {
        return $this->belongsTo(JenisReferensi::class,'jenisreferensi');
    }
    public function User()
    {
        return $this->belongsToMany(User::class,'akses','id');
    }
}
