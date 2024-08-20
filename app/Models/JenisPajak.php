<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPajak extends Model
{
    use HasFactory;

    protected $fillable = [
        'jp_nama',
        'jp_tarif',
        'jp_status'
    ];
}
