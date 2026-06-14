<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SphereLokasi extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'lokasi_id',
        'air_hidup',
        'air_kebersihan',
        'air_memasak',
        'toilet_pendek',
        'toilet_panjang',
        'kalori',
        'protein',
        'lemak'
    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class);
    }
}
