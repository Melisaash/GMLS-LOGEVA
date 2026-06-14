<?php

namespace App\Exports;

use App\Models\Pengungsi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengungsiExport implements FromCollection, WithHeadings
{
    protected $lokasiId;

    public function __construct($lokasiId)
    {
        $this->lokasiId = $lokasiId;
    }

    public function collection()
    {
        return Pengungsi::where('lokasi_id', $this->lokasiId)
            ->select(
            'nama',
            'asal',
            'tanggal_lahir',
            'nomor_kk',
            'usia',
            'jenis_kelamin',
            'kondisi_kesehatan',
            'kelompok_rentan',
            'riwayat_penyakit'
        )
            ->get();
    }

    public function headings(): array
    {
        return [
        'Nama',
        'Asal',
        'Tanggal Lahir',
        'Nomor KK',
        'Usia',
        'Jenis Kelamin',
        'Kondisi Kesehatan',
        'Kelompok Rentan',
        'Riwayat Penyakit'
    ];
    }
}