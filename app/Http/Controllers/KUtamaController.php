<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Skp;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Auth;


class KUtamaController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $aktivitas = Skp::with('getAct')->where('users_id',Auth::user()->id)->where('skp_tahun',$now->year)->where('status',2)->get();
        return view('pegawai.kegutama',[
            'aktivitas' => $aktivitas
        ]);
    }

    public function create() {
        
        $res = Kegiatan::with('getAct')->where('users_id',Auth::user()->id)->where('cacode','UTAMA')->get();
        return Datatables::of($res)->editColumn('keg_date', function($date) {
            return Carbon::parse($date->keg_date)->format('Y-m-d');
         })->make(true);
    }
}
