<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpherePengungsi extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'riwayat_pengungsi_id',
        'air_hidup',
        'air_kebersihan',
        'air_memasak',
        'toilet_pendek',
        'toilet_panjang',
        'kalori',
        'protein',
        'lemak'
    ];

    public function riwayatPengungsi(){
        return $this->belongsTo(RiwayatPengungsi::class);
    }
}
