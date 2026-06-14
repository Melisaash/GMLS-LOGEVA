<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Desa;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desas = [
            [
                'nama_desa' => 'Bayah Barat',
                'alamat_desa' => 'Desa Bayah Barat, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Bayah Timur',
                'alamat_desa' => 'Desa Bayah Timur, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Sawarna',
                'alamat_desa' => 'Desa Sawarna, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Sawarna Timur',
                'alamat_desa' => 'Desa Sawarna Timur, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Darmasari',
                'alamat_desa' => 'Desa Darmasari, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Cidikit',
                'alamat_desa' => 'Desa Cidikit, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Cimancak',
                'alamat_desa' => 'Desa Cimancak, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Suwakan',
                'alamat_desa' => 'Desa Suwakan, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Pasirgombong',
                'alamat_desa' => 'Desa Pasirgombong, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Cisuren',
                'alamat_desa' => 'Desa Cisuren, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
            [
                'nama_desa' => 'Pamubulan',
                'alamat_desa' => 'Desa Pamubulan, Kecamatan Bayah, Kabupaten Lebak, Banten'
            ],
        ];

        foreach ($desas as $desa) {
            Desa::firstOrCreate($desa);
        }
    }
}