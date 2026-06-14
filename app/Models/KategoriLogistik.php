<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriLogistik extends Model
{
    protected $fillable = [
        'nama_kategori'
    ];

    public function logistiks()
    {
        return $this->hasMany(Logistik::class);
    }
}