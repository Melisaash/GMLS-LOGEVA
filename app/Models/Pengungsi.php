<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengungsi extends Model
{
    protected $fillable = [
        'lokasi_id',
        'foto',
        'nama',
        'asal',
        'tanggal_lahir',
        'nomor_kk',
        'usia',
        'jenis_kelamin',
        'kondisi_kesehatan',
        'kelompok_rentan',
        'riwayat_penyakit'
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}