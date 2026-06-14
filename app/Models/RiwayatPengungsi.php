<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatPengungsi extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'lokasi_id',
        'total_pengungsi',
        'total_pria',
        'total_wanita',
        'dewasa',
        'lansia',
        'anak',
        'remaja',
        'ibu_menyusui',
        'balita',
        'disabilitas'
    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class);
    }

    public function spherePengungsi(){
        return $this->hasOne(SpherePengungsi::class);
    }
}
