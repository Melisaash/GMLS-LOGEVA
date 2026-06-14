<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriLogistik;

class KategoriLogistikSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Makanan',
            'Minuman',
            'Pakaian',
            'Perlengkapan Tidur',
            'Kebersihan',
            'Medis',
            'Bayi & Anak',
            'Dapur Umum',
            'Sanitasi',
            'Lainnya'
        ];

        foreach ($data as $item) {

            KategoriLogistik::firstOrCreate([
                'nama_kategori' => $item
            ]);
        }
    }
}