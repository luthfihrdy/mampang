<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Skp;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Validator;
use DB;
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

    public function store(Request $request) {
        Validator::make($request->all(), [
            'keg_date' => ['required', 'string', 'max:255'],
            'keg_jammulai' => ['required', 'string'],
            'keg_jamselesai' => ['required', 'string'],
            'keg_notes' => ['required', 'string', 'max:255'],
            'wkt_efektif'   => ['required'],
            'totalunit' => ['required','integer'],
        ]);
        
        $keg_jammulai = strtotime($request->keg_jammulai);
        $keg_jamselesai = strtotime($request->keg_jamselesai);
        $point_menit = ($keg_jamselesai - $keg_jammulai)/60;
        $wkt_efektif = $request->wkt_efektif;
        $volume = $point_menit / $wkt_efektif;
        
        if($point_menit <= 0 && $volume < 1 ) {
            return response()->json(['status'=>422,'message'=>'Masukkan Waktu dengan benar!']);
        }

        $create = Kegiatan::create([
            'users_id'      => Auth::user()->id,
            'act_id'        => $request->act_id,
            'keg_date'      => $request->keg_date,
            'keg_jammulai'  => $request->keg_jammulai,
            'keg_jamselesai'=> $request->keg_jamselesai,
            'point_menit'   => $point_menit,
            'keg_notes'     => $request->keg_notes,
            'keg_volume'    => $volume,
            'cacode'        => 'UTAMA',
            'status'        => 1,
            'totalunit'     => $request->totalunit,
        ]);

        if($create){
            return response()->json(['status'=>200,'message'=>'Data Berhasil Di Input']);
        }else{
            return response()->json(['status'=>422,'message'=>$validator->messages()]);
        }
    }
}
