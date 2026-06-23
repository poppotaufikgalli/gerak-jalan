<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'tgl_buka',
        'tgl_tutup',
        'min_no_peserta',
        'aktif',
    ];

    protected $dates = ['tgl_buka', 'tgl_tutup'];

    protected $casts = [
        'tgl_buka' => 'datetime:Y-m-d H:i:s',
        'tgl_tutup' => 'datetime:Y-m-d H:i:s',
    ];
}
