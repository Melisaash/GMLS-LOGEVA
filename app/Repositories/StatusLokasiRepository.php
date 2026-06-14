<?php

namespace App\Repositories;

use App\Interfaces\StatusLokasiRepositoryInterface;
use App\Models\StatusLokasi;


class StatusLokasiRepository implements StatusLokasiRepositoryInterface
{
    public function getAllStatusLokasis() {
        return StatusLokasi::all();
    }

    public function getStatusLokasiById(int $id) {
        return StatusLokasi::where('id', $id)->first();
    }

    public function createStatusLokasi(array $data){
        return StatusLokasi::create($data);
    }

    public function updateStatusLokasi(int $id, array $data){
        $statusLokasi = $this->getStatusLokasiById($id);
        
        return $statusLokasi->update($data);
    }

    public function deleteStatusLokasi(int $id) {
        $statusLokasi = $this->getStatusLokasiById($id);
       
        return $statusLokasi->delete();
    }
}