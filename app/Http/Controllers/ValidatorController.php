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
        SUM(point_menit) as menit, 
        (SELECT count(*) FROM kegiatan WHERE status = 1 AND MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun) AS waiting,
        (SELECT count(*) FROM kegiatan WHERE status = 2 AND MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun) AS approved,
        (SELECT count(*) FROM kegiatan WHERE status = 3 AND MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun) AS rejected,
        (SELECT sum(point_menit) FROM kegiatan WHERE status = 2 AND MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun) as total,
        (SELECT harikerja.jmlhari WHERE harikerja.bulan = bulan AND harikerja.tahun) as target
        FROM kegiatan
        JOIN harikerja
        JOIN users
        ON users.id = kegiatan.users_id
        GROUP BY tahun, bulan;");

        return Datatables::of($res)->editColumn('keg_date', function($date) {
            return Carbon::parse($date->keg_date)->format('Y-m-d');
         })->make(true);
    }

    public function approve($ids) {
        $kegiatan = Kegiatan::find($ids);
        $kegiatan->status = 'Approved';
        $success = $kegiatan->save();

        if($success){
            return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di Approve']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Approve']);  
        }
    }

    public function reject($ids) {
        $kegiatan = Kegiatan::find($ids);
        $kegiatan->status = 'Rejected';
        $success = $kegiatan->save();

        if($success){
            return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di Tolak']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Tolak']);  
        }
    }
}
