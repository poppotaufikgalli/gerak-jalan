<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DateTime;

class Pendaftar extends Model
{
    use HasFactory;

    public function lomba()
    {
        return $this->hasOne(Lomba::class, 'id', 'id_lomba');
    }

    public function kategori_peserta()
    {
        return $this->hasOne(KatPeserta::class, 'id', 'id_peserta');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_pendaftar', 'id');
    }

    public function diskualifikasi()
    {
        return $this->hasMany(Diskualifikasi::class, 'id_pendaftar', 'id');
    }

    protected $fillable = [
        'id_lomba',
        'id_peserta',
        'no_peserta',
        'nama',
        'alamat',
        'pic',
        'ketua',
        'telp',
        'telp_ketua',
        'aktif',
        'total',
        'etape',
        'diskualifikasi',
        'verif_id',
        'waktu_start',
        'waktu_finish',
    ];

    //protected $dates = ['waktu_start', 'waktu_finish'];
    protected $casts = [
        'waktu_start' => 'datetime',
        'waktu_finish' => 'datetime',
    ];

    protected $appends = ['waktu_tempuh'];

    public function getWaktuTempuhAttribute()
    {
        $waktu_start = \Carbon\Carbon::parse($this->waktu_start);
        $waktu_finish = \Carbon\Carbon::parse($this->waktu_finish);

        if ($waktu_start && $waktu_finish && ($this->waktu_finish != null && $this->waktu_start != null)) {
            $interval = $waktu_start->diffInSeconds($waktu_finish);
            //$spent_time = gmdate('H:i:s', $interval);
            return $interval;
        } else {
            return null;
        }

    }
}
