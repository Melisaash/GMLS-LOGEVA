<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lokasi;
use App\Models\Logistik;
use App\Models\StokMasuk;
use App\Models\StokLogistik;

class StokMasukController extends Controller
{
    public function create($lokasi)
    {
        $lokasi = Lokasi::findOrFail($lokasi);

        $logistiks = Logistik::all();

        return view('logistik.create', compact(
            'lokasi',
            'logistiks'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi_id' => 'required',
            'logistik_id' => 'required',
            'jumlah_masuk' => 'required|integer|min:1',
            'sumber_bantuan' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        StokMasuk::create([
            'lokasi_id' => $request->lokasi_id,
            'logistik_id' => $request->logistik_id,
            'relawan_id' => auth()->user()->relawan?->id,
            'jumlah_masuk' => $request->jumlah_masuk,
            'sumber_bantuan' => $request->sumber_bantuan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keterangan' => $request->keterangan,
        ]);

        $stok = StokLogistik::firstOrCreate(
            [
                'lokasi_id' => $request->lokasi_id,
                'logistik_id' => $request->logistik_id,
            ],
            [
                'jumlah_stok' => 0,
                'status_ketersediaan' => 'Merah'
            ]
        );

        $stok->jumlah_stok += $request->jumlah_masuk;

        if ($stok->jumlah_stok > 100) {

            $stok->status_ketersediaan = 'Hijau';

        } elseif ($stok->jumlah_stok > 0) {

            $stok->status_ketersediaan = 'Kuning';

        } else {

            $stok->status_ketersediaan = 'Merah';
        }

        $stok->save();

        return redirect()->back()
            ->with('success', 'Donasi berhasil dicatat');
    }

    public function index($lokasi_id)
{
    $lokasi = Lokasi::with('sphereLokasi')->findOrFail($lokasi_id);

    $stokLogistiks = StokLogistik::with('logistik')
        ->where('lokasi_id', $lokasi_id)
        ->get();

    $riwayatMasuk = StokMasuk::with('logistik')
        ->where('lokasi_id', $lokasi_id)
        ->latest()
        ->get();

        $jumlahKritis = 0;
        $jumlahWaspada = 0;
        $jumlahAman = 0;
        $totalHariBertahan = 0;

        foreach ($stokLogistiks as $stok) {

    $kebutuhanPerHari = 0;

   if (strtolower($stok->logistik->nama_item) == 'beras') {

    $kebutuhanPerHari =
        round(
            ($lokasi->sphereLokasi->kalori / 180 * 100) / 1000,
            2
        );

} elseif (strtolower($stok->logistik->nama_item) == 'air mineral') {

    $kebutuhanPerHari =
        $lokasi->sphereLokasi->air_hidup +
        $lokasi->sphereLokasi->air_kebersihan +
        $lokasi->sphereLokasi->air_memasak;

} else {

    $kebutuhanPerHari =
        $stok->logistik->kebutuhan_harian ?? 0;
}
    $hariBertahan =
        $kebutuhanPerHari > 0
        ? ($stok->jumlah_stok / $kebutuhanPerHari)
        : 0;

    $totalHariBertahan += $hariBertahan;

    if ($hariBertahan < 3) {

        $jumlahKritis++;

    } elseif ($hariBertahan < 7) {

        $jumlahWaspada++;

    } else {

        $jumlahAman++;
    }
}

$rataHariBertahan =
    $stokLogistiks->count() > 0
    ? round($totalHariBertahan / $stokLogistiks->count(), 2)
    : 0;

   return view('logistik.index', compact(
    'lokasi',
    'stokLogistiks',
    'riwayatMasuk',
    'jumlahKritis',
    'jumlahWaspada',
    'jumlahAman',
    'rataHariBertahan'
));

}
}