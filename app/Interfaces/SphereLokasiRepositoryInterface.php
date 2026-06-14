<?php

namespace App\Interfaces;

interface SphereLokasiRepositoryInterface
{
    // public function getAllSphereLokasis();
    // public function getSphereLokasiById(int $id);
    // public function createSphereLokasi(array $data);
    // public function updateSphereLokasi(int $id, array $data);
    // public function deleteSphereLokasi(int $id);

     // Get all sphere data (optional)
    public function getAllSphereLokasis();
    
    // Get sphere by its ID
    public function getSphereLokasiById(int $id);
    
    // Get sphere by lokasi_id (more useful based on your relation)
    public function getSphereLokasiByLokasiId(int $lokasiId);
    
    // Create new sphere data
    public function createSphereLokasi(array $data);
    
    // Update sphere data
    public function updateSphereLokasi(int $id, array $data);
    
    // Alternative update by lokasi_id
    public function updateSphereLokasiByLokasi(int $lokasiId, array $data);
    
    // Delete sphere data
    public function deleteSphereLokasi(int $id);
    
   
    
}