<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokLogistik extends Model
{
    protected $fillable = [
        'lokasi_id',
        'logistik_id',
        'jumlah_stok',
        'status_ketersediaan'
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function logistik()
    {
        return $this->belongsTo(Logistik::class);
    }
}