<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\DesaRepositoryInterface;
use App\Interfaces\LokasiRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private LokasiRepositoryInterface $lokasiRepository;
    private DesaRepositoryInterface $desaRepository;

    public function __construct(
        LokasiRepositoryInterface $lokasiRepository,
        DesaRepositoryInterface $desaRepository
    ){  
        $this->lokasiRepository = $lokasiRepository;
        $this->desaRepository = $desaRepository;
    }
    public function index()
    {
        $desas = $this->desaRepository->getAllDesas();
        $lokasis = $this->lokasiRepository->getLatestLokasi();
        return view('pages.app.home', compact('desas','lokasis'));
    }
}
