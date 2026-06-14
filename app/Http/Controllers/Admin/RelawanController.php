<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRelawanRequest;
use App\Http\Requests\UpdateRelawanRequest;
use App\Interfaces\RelawanRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class RelawanController extends Controller
{
    private RelawanRepositoryInterface $relawanRepository;

    public function __construct(RelawanRepositoryInterface $relawanRepository)
    {
        $this->relawanRepository = $relawanRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relawans = $this->relawanRepository->getAllRelawans();
        return view('pages.admin.relawan.index', compact('relawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.relawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRelawanRequest $request)
    {
        $data = $request->validated();
        $data ['avatar'] = $request -> file('avatar')->store('assets/avatar', 'public');
        $this->relawanRepository ->createRelawan($data);

        Swal::toast('Relawan Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.relawan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $relawan = $this->relawanRepository->getRelawanById($id);
        return view('pages.admin.relawan.show', compact('relawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $relawan = $this->relawanRepository->getRelawanById($id);
        return view('pages.admin.relawan.edit', compact('relawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRelawanRequest $request, string $id)
    {
        $data = $request->validated();
        if ($request->avatar){
            $data['avatar'] = $request -> file('avatar')->store('assets/avatar', 'public');
        }

        $this ->relawanRepository->updateRelawan($id, $data);
        Swal::toast('Relawan Berhasil Diubah', 'success')->timerProgressBar();
        return redirect()->route('admin.relawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->relawanRepository->deleteRelawan($id);
        Swal::toast('Relawan Berhasil Dihapus', 'success')->timerProgressBar();
        return redirect()->route('admin.relawan.index');
    }
}
