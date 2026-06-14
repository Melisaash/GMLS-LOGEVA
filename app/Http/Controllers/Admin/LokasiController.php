<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;
use App\Interfaces\DesaRepositoryInterface;
use App\Interfaces\LokasiRepositoryInterface;
use App\Interfaces\RelawanRepositoryInterface;
use App\Interfaces\SphereLokasiRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use App\Exports\LokasiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Lokasi; 

class LokasiController extends Controller
{

    private LokasiRepositoryInterface $lokasiRepository;
    private DesaRepositoryInterface $desaRepository;
    private RelawanRepositoryInterface $relawanRepository;

    private SphereLokasiRepositoryInterface $sphereLokasiRepository;


    public function __construct(
        LokasiRepositoryInterface $lokasiRepository,
        DesaRepositoryInterface $desaRepository,
        RelawanRepositoryInterface $relawanRepository,
        SphereLokasiRepositoryInterface $sphereLokasiRepository
    )
    {
        $this->lokasiRepository = $lokasiRepository;
        $this->desaRepository = $desaRepository;
        $this->relawanRepository = $relawanRepository;
        $this->sphereLokasiRepository = $sphereLokasiRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasis = $this->lokasiRepository->getAllLokasis();
        return view("pages.admin.lokasi.index", compact("lokasis"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $relawans = $this->relawanRepository->getAllRelawans();
        $desas = $this->desaRepository->getAllDesas();
        return view('pages.admin.lokasi.create', compact('relawans','desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLokasiRequest $request)
    {
        $data = $request->validated();

        $data['gambar_lokasi'] = $request -> file('gambar_lokasi')->store('assets/lokasi/gambar', 'public');
        // Create lokasi
        $lokasi = $this->lokasiRepository->createLokasi($data);
        
        // Create sphere data terkait
        $sphereData = $request->only([
            'air_hidup', 
            'air_kebersihan', 
            'air_memasak',
            'toilet_pendek',
            'toilet_panjang',
            'kalori',
            'protein',
            'lemak'
        ]);
        
        if (!empty(array_filter($sphereData))) {
            $sphereData['lokasi_id'] = $lokasi->id;
            $this->sphereLokasiRepository->createSphereLokasi($sphereData);
        }


        Swal::toast('Lokasi Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.lokasi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lokasi = $this->lokasiRepository->getLokasiById((int)$id);
        $sphere = $this->sphereLokasiRepository->getSphereLokasiByLokasiId((int)$id);
        return view('pages.admin.lokasi.show', compact('lokasi', 'sphere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $relawans = $this->relawanRepository->getAllRelawans();
        $desas = $this->desaRepository->getAllDesas();

        $lokasi = $this->lokasiRepository->getLokasiById((int)$id);
        return view('pages.admin.lokasi.edit', compact('lokasi','relawans','desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLokasiRequest $request, string $id)
    {
        $data = $request->validated();
        if ($request->gambar_lokasi) {
            $data['gambar_lokasi'] = $request->file('gambar_lokasi')->store('assets/lokasi/gambar', 'public');
        }

        $this ->lokasiRepository->updateLokasi($id, $data);

        // Create sphere data terkait
    $sphereData = $request->only([
        'air_hidup', 
        'air_kebersihan', 
        'air_memasak',
        'toilet_pendek',
        'toilet_panjang',
        'kalori',
        'protein',
        'lemak'
    ]);

        if (!empty(array_filter($sphereData))) {
        $this->sphereLokasiRepository->updateSphereLokasiByLokasi($id, $sphereData);
    }
        Swal::toast('Desa Lokasi Berhasil Diubah', 'success')->timerProgressBar();
        return redirect()->route('admin.lokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->lokasiRepository->deleteLokasi($id);
        Swal::toast('Lokasi Berhasil Dihapus', 'success')->timerProgressBar();
        return redirect()->route('admin.lokasi.index');
    }


    public function export() 
    {
        return Excel::download(new LokasiExport, 'data_lokasi.xlsx');
    }
}
