<?php

namespace App\Repositories;

use App\Interfaces\SphereLokasiRepositoryInterface;
use App\Models\SphereLokasi;

class SphereLokasiRepository implements SphereLokasiRepositoryInterface
{
    public function getAllSphereLokasis()
    {
        // Lebih baik dengan eager loading relasi lokasi
        return SphereLokasi::with('lokasi')->get();
    }

    public function getSphereLokasiById(int $id)
    {
        return SphereLokasi::with('lokasi')->findOrFail($id);
    }

    public function getSphereLokasiByLokasiId(int $lokasiId)
    {
        return SphereLokasi::where('lokasi_id', $lokasiId)
                          ->with('lokasi')
                          ->first();
    }

    public function createSphereLokasi(array $data)
    {
        // Validasi lokasi_id harus ada
        if (!isset($data['lokasi_id'])) {
            throw new \InvalidArgumentException('lokasi_id is required');
        }
        
        return SphereLokasi::create($data);
    }

    public function updateSphereLokasi(int $id, array $data)
    {
        $sphereLokasi = $this->getSphereLokasiById($id);
        return $sphereLokasi->update($data);
    }

    public function updateSphereLokasiByLokasi(int $lokasiId, array $data)
    {
        $sphereLokasi = $this->getSphereLokasiByLokasiId($lokasiId);
        
        if (!$sphereLokasi) {
            return $this->createSphereLokasi(array_merge($data, ['lokasi_id' => $lokasiId]));
        }
        
        return $sphereLokasi->update($data);
    }

    public function deleteSphereLokasi(int $id)
    {
        $sphereLokasi = $this->getSphereLokasiById($id);
        return $sphereLokasi->delete();
    }

    public function createOrUpdateSphereLokasi(array $data, int $lokasiId = null)
    {
        if ($lokasiId) {
            return SphereLokasi::updateOrCreate(
                ['lokasi_id' => $lokasiId],
                $data
            );
        }
        
        return SphereLokasi::create($data);
    }
}