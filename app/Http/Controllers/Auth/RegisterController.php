<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRelawanRequest;
use App\Interfaces\RelawanRepositoryInterface;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
     private RelawanRepositoryInterface $relawanRepository;

    public function __construct(RelawanRepositoryInterface $relawanRepository)
    {
        $this->relawanRepository = $relawanRepository;
    }
    public function index(){
        return view("pages.auth.register");
    }

    public function store(StoreRelawanRequest $request){
        $data = $request->validated();
        $data ['avatar'] = $request -> file('avatar')->store('assets/avatar', 'public');
        $this->relawanRepository ->createRelawan($data);
        

        return redirect()->route('login')->with('success','Register Berhasil Silahkan Login');
    }
}
