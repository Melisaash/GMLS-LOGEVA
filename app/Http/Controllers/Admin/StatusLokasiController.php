<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusLokasiRequest;
use App\Http\Requests\UpdateStatusLokasiRequest;
use App\Interfaces\LokasiRepositoryInterface;
use Illuminate\Http\Request;
use App\Interfaces\StatusLokasiRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;

use App\Repositories\LokasiRepository;
use Illuminate\Contracts\Cache\Store;

class StatusLokasiController extends Controller
{
    private StatusLokasiRepositoryInterface $statusLokasiRepository;
    private LokasiRepositoryInterface $lokasiRepository;

    public function __construct(
        StatusLokasiRepositoryInterface $statusLokasiRepository,
        LokasiRepositoryInterface $lokasiRepository,
    ){
        $this->statusLokasiRepository = $statusLokasiRepository;
        $this->lokasiRepository = $lokasiRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lokasiId)
    {
        $lokasi = $this->lokasiRepository->getLokasiById($lokasiId);
        return view('pages.admin.status-lokasi.create',compact('lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusLokasiRequest $request)
    {
        $data = $request->validated();

        $this->statusLokasiRepository ->createStatusLokasi($data);

        Swal::toast('Progress Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.lokasi.show', $request->lokasi_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $status = $this->statusLokasiRepository->getStatusLokasiById($id);
        return view('pages.admin.status-lokasi.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusLokasiRequest $request, string $id)
    {
        $data = $request->validated();

        $this ->statusLokasiRepository->updateStatusLokasi($id, $data);
        Swal::toast('Progress Berhasil Diubah', 'success')->timerProgressBar();
        return redirect()->route('admin.lokasi.show', $request->lokasi_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = $this->statusLokasiRepository->getStatusLokasiById($id);
        $this->statusLokasiRepository->deleteStatusLokasi($id);
        Swal::toast('Status Berhasil Dihapus', 'success')->timerProgressBar();
        return redirect()->route('admin.lokasi.show', $status->lokasi_id);
    }
}
