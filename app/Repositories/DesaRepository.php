<?php

namespace App\Repositories;

use App\Interfaces\DesaRepositoryInterface;
use App\Models\Desa;


class DesaRepository implements DesaRepositoryInterface
{
    public function getAllDesas() {
        return Desa::all();
    }

    public function getDesaById(int $id) {
        return Desa::where('id', $id)->first();
    }

    public function createDesa(array $data){
        return Desa::create($data);
    }

    public function updateDesa(int $id, array $data){
        $desa = $this->getDesaById($id);
        
        return $desa->update($data);
    }

    public function deleteDesa(int $id) {
        $desa = $this->getDesaById($id);
       
        return $desa->delete();
    }
}