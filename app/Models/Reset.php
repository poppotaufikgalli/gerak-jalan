<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendaftar',
        'nama_regu',
        'id_juri',
        'nama_juri',
        'jns',
        'nilai_awal',
    ];
}
