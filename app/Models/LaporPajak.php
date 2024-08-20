<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporPajak extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_lapor',
        'objek_id',
        'jenis_id',
        'omset_harian',
        'pajak',
        'keterangan',
        'userinput'
    ];

    public function objek(): BelongsTo 
    {
        return $this->belongsTo(ObjekPajak::class);
    }

    public function jenis(): BelongsTo 
    {
        return $this->belongsTo(JenisPajak::class);
    }
}
