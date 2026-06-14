<?php

namespace App\Interfaces;

interface DesaRepositoryInterface{
    public function getAllDesas();
    public function getDesaById(int $id);

    public function createDesa(array $data);

    public function updateDesa(int $id, array $data);

    public function deleteDesa(int $id);
}