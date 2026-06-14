<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_desa',
        'alamat_desa'
    ];

    public function lokasi(){
        return $this->hasMany(Lokasi::class);
    }
}
