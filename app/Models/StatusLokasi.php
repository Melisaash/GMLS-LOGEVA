<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class StatusLokasi extends Model
{   
    use SoftDeletes;

    protected $fillable = [
        'lokasi_id',
        'status',
        'catatan'
    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class);
    }

    public function scopeLatestForLokasi($query)
    {
        return $query->select('status_lokasis.*')
            ->join(DB::raw('(SELECT MAX(id) as max_id FROM status_lokasis GROUP BY lokasi_id) as latest'), 
                'status_lokasis.id', '=', 'latest.max_id');
    }
}
