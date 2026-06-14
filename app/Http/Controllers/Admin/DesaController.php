<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Interfaces\DesaRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class DesaController extends Controller
{

    private DesaRepositoryInterface $desaRepository;

    public function __construct(DesaRepositoryInterface $desaRepository)
    {
        $this->desaRepository = $desaRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desas = $this->desaRepository->getAllDesas();
        return view('pages.admin.desa.index', compact('desas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDesaRequest $request)
    {
        $data = $request->validated();

        $this->desaRepository ->createDesa($data);

        Swal::toast('Desa Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.desa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $desa = $this->desaRepository->getDesaById($id);
        return view('pages.admin.desa.show', compact('desa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $desa = $this->desaRepository->getDesaById($id);
        return view('pages.admin.desa.edit', compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesaRequest $request, string $id)
    {
        $data = $request->validated();

        $this ->desaRepository->updateDesa($id, $data);
        Swal::toast('Desa Berhasil Diubah', 'success')->timerProgressBar();
        return redirect()->route('admin.desa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->desaRepository->deleteDesa($id);
        Swal::toast('Desa Berhasil Dihapus', 'success')->timerProgressBar();
        return redirect()->route('admin.desa.index');
    }
}
