<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLokasiRequest;
use App\Interfaces\DesaRepositoryInterface;
use App\Interfaces\LokasiRepositoryInterface;
use App\Interfaces\SphereLokasiRepositoryInterface;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    private LokasiRepositoryInterface $lokasiRepository;

    private DesaRepositoryInterface $desaRepository;

        private SphereLokasiRepositoryInterface $sphereLokasiRepository;


    public function __construct(
        LokasiRepositoryInterface $lokasiRepository,
        DesaRepositoryInterface $desaRepository,
        SphereLokasiRepositoryInterface $sphereLokasiRepository

    ){  
        $this->lokasiRepository = $lokasiRepository;
        $this->desaRepository = $desaRepository;
        $this->sphereLokasiRepository = $sphereLokasiRepository;
    }

    public function index(Request $request){

        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = $request->radius ?? 9999;
        if ($request->desa) {
            $lokasis = $this->lokasiRepository->getLokasiByDesa($request->desa);
        } elseif ($latitude && $longitude) {
            $lokasis = $this->lokasiRepository->getNearbyLokasis($latitude, $longitude, $radius);
        } else {
            $lokasis = $this->lokasiRepository->getAllLokasis();
        }
       
        return view('pages.app.lokasi.index', compact('lokasis'));
    }

    public function myLokasi(Request $request){
        $lokasis = $this->lokasiRepository->getLokasiByRelawanId($request->status);
        return view('pages.app.lokasi.my-lokasi', compact('lokasis'));
    }
    public function show($id){
        $lokasi = $this->lokasiRepository->getLokasiById($id);
        return view('pages.app.lokasi.show', compact('lokasi'));
    }

    public function create (){
        $desas = $this->desaRepository->getAllDesas();
        return view('pages.app.lokasi.create', compact('desas'));
    }

    public function store(StoreLokasiRequest $request){
        $data = $request->validated();
        $data['relawan_id'] = Auth()->user()->relawan->id;
        $data['gambar_lokasi'] = $request -> file('gambar_lokasi')->store('assets/lokasi/gambar', 'public');
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

        return redirect()->route('lokasi.success')->with('success','Lokasi Berhasil Ditambahkan');
    }


    public function success(){
        return view('pages.app.lokasi.success');
    }

}
