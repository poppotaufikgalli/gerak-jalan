<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskualifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendaftar',
        'alasan',
        'uid',
        'doc',
    ];
}
