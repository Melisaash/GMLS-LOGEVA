<?php

namespace App\Interfaces;

interface RelawanRepositoryInterface{
    public function getAllRelawans();
    public function getRelawanById(int $id);

    public function createRelawan(array $data);

    public function updateRelawan(int $id, array $data);

    public function deleteRelawan(int $id);
}