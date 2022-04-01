<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Models\Aktivitas;
use Validator;
use Auth;
use DB;

class KegiatanController extends Controller
{
    public function index()
    {
        $aktivitas = DB::table('aktivitas')->get();
        return view('pegawai.kegiatan',[
            'aktivitas' => $aktivitas,

        ]);
    }

    public function create()
    {
        $res = DB::table('kegiatanumum')->where('user_id',Auth::user()->id)->get();
        return Datatables::of($res)->editColumn('keg_date', function($date) {
            return Carbon::parse($date->keg_date)->format('Y-m-d');
         })->make(true);
    }

    // public function get_all_aktifitas(){
    //     $this->db->from('m_activity');
    //     $query = $this->db->get();
    //     return $query->result(); //setelah selesai pindah ke controller book
    // }

    public function storeKegiatan(Request $request)
    {
        Validator::make($request->all(), [
            'keg_date' => ['required', 'string', 'max:255'],
            'keg_jammulai' => ['required', 'string'],
            'keg_jamselesai' => ['required', 'string'],
            'keg_notes' => ['required', 'string', 'max:255'],
        ]);
        
        $keg_jammulai = strtotime($request->keg_jammulai);
        $keg_jamselesai = strtotime($request->keg_jamselesai);
        $point_menit = ($keg_jamselesai - $keg_jammulai)/60;

        if($point_menit <= 0) {
            return response()->json(['status'=>422,'message'=>'Waktu tidak valid!']);
        }

        $create = Kegiatan::create([
            'user_id' => Auth::user()->id,
            'keg_date' => $request->keg_date,
            'keg_jammulai' => $request->keg_jammulai,
            'keg_jamselesai' => $request->keg_jamselesai,
            'point_menit' => $point_menit,
            'kegiatan_notes' => $request->kegiatan_notes,
        ]);

        if($create){
            return response()->json(['status'=>200,'message'=>'Data Berhasil Di Input']);
        }else{
            return response()->json(['status'=>422,'message'=>$validator->messages()]);
        }
    }

    public function updateKegiatan(Request $request) {
        $res = DB::table('kegiatanumum')->where('id',$request->id)->get();
        return response()->json($res);
    }

    public function editKegiatan(Request $request) {
        Validator::make($request->all(), [
            'keg_date' => ['required', 'string', 'max:255'],
            'keg_jammulai' => ['required', 'string'],
            'keg_jamselesai' => ['required', 'string'],
            'keg_notes' => ['required', 'string', 'max:255'],
        ]);

        $keg_jammulai = strtotime($request->keg_jammulai);
        $keg_jamakhir = strtotime($request->keg_jamakhir);
        $point_menit = ($keg_jamakhir - $keg_jammulai)/60;

        if($point_menit <= 0) {
            return response()->json(['status'=>422,'message'=>'Waktu tidak valid!']);
        }

        $data = Kegiatan::find($request->id);

        $data->keg_date = $request->keg_date;
        $data->keg_jammulai = $request->keg_jammulai;
        $data->keg_jamakhir = $request->keg_jamakhir;
        $data->point_menit = $point_menit;
        $data->keg_notes = $request->keg_notes;
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
