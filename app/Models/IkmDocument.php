<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IkmDocument extends Model
{
    use HasFactory;

    protected $table = 'ikm_documents';

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

    public function scopeFilter($query)
    {
        $search = trim((string) request('q', ''));
        if ($search !== '') {
            $query->where('deskripsi', 'like', '%' . $search . '%');
        }
    }

    public function getDownloadUrlAttribute(): string
    {
        $url = (string) ($this->link_dokumen ?? '');
        $fileId = self::extractGoogleDriveFileId($url);

        if ($fileId) {
            return 'https://drive.google.com/uc?export=download&id=' . $fileId;
        }

        return $url;
    }

    private static function extractGoogleDriveFileId(string $url): ?string
    {
        if ($url === '') {
            return null;
        }

        // Common formats:
        // - https://drive.google.com/file/d/<ID>/view?usp=sharing
        // - https://drive.google.com/open?id=<ID>
        // - https://drive.google.com/uc?id=<ID>&export=download
        if (preg_match('~drive\.google\.com/file/d/([^/]+)~', $url, $m)) {
            return $m[1];
        }

        if (preg_match('~[?&]id=([^&]+)~', $url, $m)) {
            return $m[1];
        }

        return null;
    }
}
