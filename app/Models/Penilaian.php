<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendaftar',
        'id_juri',
        'id_nilai',
        'nilai',
        'waktu_start',
        'waktu_finish',
    ];
}
