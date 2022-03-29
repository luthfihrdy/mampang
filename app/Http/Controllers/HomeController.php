<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kegiatan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminDash() {
        $user = User::all();
        $validator = User::where('role_id',2)->get();
        $pegawai = User::where('role_id',3)->get();
        $kegiatan = Kegiatan::all();
        return view('admin.home',[
            'users' => $user,
            'validators' => $validator,
            'pegawais' => $pegawai,
            'kegiatans' => $kegiatan,
        ]);
    }

    public function validatorDash() {
        return view('validator.home');
    }

    public function pegawaiDash() {
        return view('pegawai.home');
    }
}
