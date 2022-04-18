<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;

class ValidatorController extends Controller
{
    public function index() {
        return view('validator.aktivitas');
    }

    public function create() {
        $res = DB::select("
        SELECT kegiatan.id, 
        keg_date, 
        YEAR(keg_date) AS tahun, 
        MONTHNAME(keg_date) AS bulan , 
        users.name, 
        users.id as users_id,
        SUM(point_menit) as menit, 
        (SELECT count(*) FROM kegiatan WHERE status = 1 AND MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun AND users.id = kegiatan.users_id) AS waiting,
        (SELECT count(*) FROM kegiatan WHERE status = 2 AND MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun AND users.id = kegiatan.users_id) AS approved,
        (SELECT count(*) FROM kegiatan WHERE status = 3 AND MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun AND users.id = kegiatan.users_id) AS rejected,
        (SELECT sum(point_menit) FROM kegiatan WHERE status = 2 AND MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun AND users.id = kegiatan.users_id) as total
        FROM kegiatan
        JOIN users
        ON users.id = kegiatan.users_id
        GROUP BY tahun, bulan, users.id;");

        return Datatables::of($res)->editColumn('keg_date', function($date) {
            return Carbon::parse($date->keg_date)->format('Y-m-d');
         })->make(true);
    }

    public function detail_validasi(Request $request){
        $getMonth = substr($request->get_date,5,2);
        $getYear = substr($request->get_date,0,4);
        $res = Kegiatan::with('getAct')->with('getUser')->where('cacode','UMUM')->whereMonth('keg_date',$getMonth)->whereYear('keg_date',$getYear)->where('status',$request->status)->where('users_id',$request->users_id)
        ->get();
        //dd($res);
        return view('validator.validasi_detail',['data' => $res]);
    }

    public function validasi($id,$status) {
        $kegiatan = Kegiatan::find($id);
        if($status == 'approve'){
            $kegiatan->status = '2';
        }else if($status == 'reject') {
            $kegiatan->status = '3';
        }
        
        $success = $kegiatan->save();

        if($success){
            return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di validasi']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Approve']);  
        }
    }

    // public function detail_validasi(Request $request){
    //     //$date = $request->keg_date.'-1 00:00:01';
    //     // $getMonth = substr($request->keg_date,4,6);
    //     $res = Kegiatan::with('getAct')->with('getUser')->where('cacode','UMUM')->where('status',$request->status)
    //     ->get();
    //     return Datatables::of($res)->editColumn('keg_date', function($date) {
    //         return Carbon::parse($date->keg_date)->format('Y-m-d');
    //      })->make(true);
    // }

    public function getAktivitasKegiatanFilter(Request $request) {
        
    }

    // public function approve($ids) {
    //     $kegiatan = Kegiatan::find($ids);
    //     $kegiatan->status = 'Approved';
    //     $success = $kegiatan->save();

    //     if($success){
    //         return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di Approve']);
    //     }else{
    //         return response()->json(['status'=>422,'message'=>'Data Gagal Di Approve']);  
    //     }
    // }

    // public function reject($ids) {
    //     $kegiatan = Kegiatan::find($ids);
    //     $kegiatan->status = 'Rejected';
    //     $success = $kegiatan->save();

    //     if($success){
    //         return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di Tolak']);
    //     }else{
    //         return response()->json(['status'=>422,'message'=>'Data Gagal Di Tolak']);  
    //     }
    // }
}
