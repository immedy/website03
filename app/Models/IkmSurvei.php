<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IkmSurvei extends Model
{
    use HasFactory;

    protected $table = 'ikm_surveis';

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $casts = [
        'status' => 'boolean',
        'pegawai_id' => 'integer',
    ];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function getDokumenUrlAttribute(): string
    {
        return asset('storage/' . $this->dokumen);
    }
}
