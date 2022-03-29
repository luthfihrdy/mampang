<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('pegawai.kegiatan');
    }

    public function create()
    {
        $res = DB::table('kegiatans')->where('user_id',Auth::user()->id)->get();
        return Datatables::of($res)->editColumn('tanggal_kegiatan', function($date) {
            return Carbon::parse($date->tanggal_kegiatan)->format('Y-m-d');
         })->make(true);
    }

    public function storeKegiatan(Request $request)
    {
        Validator::make($request->all(), [
            'tanggal_kegiatan' => ['required', 'string', 'max:255'],
            'jam_awal' => ['required', 'string'],
            'jam_akhir' => ['required', 'string'],
            'kegiatan' => ['required', 'string', 'max:255'],
        ]);
        
        $jam_awal = strtotime($request->jam_awal);
        $jam_akhir = strtotime($request->jam_akhir);
        $point_menit = ($jam_akhir - $jam_awal)/60;

        if($point_menit <= 0) {
            return response()->json(['status'=>422,'message'=>'Waktu tidak valid!']);
        }

        $create = Kegiatan::create([
            'user_id' => Auth::user()->id,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'jam_awal' => $request->jam_awal,
            'jam_akhir' => $request->jam_akhir,
            'point_menit' => $point_menit,
            'kegiatan' => $request->kegiatan,
        ]);

        if($create){
            return response()->json(['status'=>200,'message'=>'Data Berhasil Di Input']);
        }else{
            return response()->json(['status'=>422,'message'=>$validator->messages()]);
        }
    }

    public function updateKegiatan(Request $request) {
        $res = DB::table('kegiatans')->where('id',$request->id)->get();
        return response()->json($res);
    }

    public function editKegiatan(Request $request) {
        Validator::make($request->all(), [
            'tanggal_kegiatan' => ['required', 'string', 'max:255'],
            'jam_awal' => ['required', 'string'],
            'jam_akhir' => ['required', 'string'],
            'kegiatan' => ['required', 'string', 'max:255'],
        ]);

        $jam_awal = strtotime($request->jam_awal);
        $jam_akhir = strtotime($request->jam_akhir);
        $point_menit = ($jam_akhir - $jam_awal)/60;

        if($point_menit <= 0) {
            return response()->json(['status'=>422,'message'=>'Waktu tidak valid!']);
        }

        $data = Kegiatan::find($request->id);

        $data->tanggal_kegiatan = $request->tanggal_kegiatan;
        $data->jam_awal = $request->jam_awal;
        $data->jam_akhir = $request->jam_akhir;
        $data->point_menit = $point_menit;
        $data->kegiatan = $request->kegiatan;
        $success = $data->save();

        if($success){
            return response()->json(['status'=>200,'message'=>'Data Berhasil Di Ubah!']);
        }else{
            return response()->json(['status'=>422,'message'=>$validator->messages()]);
        }
    }

    public function destroyKegiatan($ids) {
        $kegiatan = Kegiatan::find($ids);
        $success = $kegiatan->delete();
        if($success){
            return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di Hapus']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Hapus']);  
        }
    }
}
