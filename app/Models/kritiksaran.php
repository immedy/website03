<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kritiksaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function referensi():BelongsTo
    {
        return $this->belongsTo(referensi::class,'nilai');
    }
}
