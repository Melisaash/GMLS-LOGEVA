<?php

namespace App\Interfaces;

interface StatusLokasiRepositoryInterface
{
    public function getAllStatusLokasis();
    public function getStatusLokasiById(int $id);
    public function createStatusLokasi(array $data);
    public function updateStatusLokasi(int $id, array $data);
    public function deleteStatusLokasi(int $id);
}