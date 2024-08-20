<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ObjekPajak extends Model
{
    use HasFactory;

    protected $fillable = [
        'op_nama',
        'op_pengelola',
        'nohp_pengelola',
        'op_alamat',
        'op_status',
        'user_id',
        'jp_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jp(): BelongsTo
    {
        return $this->belongsTo(JenisPajak::class);
    }
}
