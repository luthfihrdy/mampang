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
        $res = Kegiatan::with('getUser')->get();
        return Datatables::of($res)->editColumn('tanggal_kegiatan', function($date) {
            return Carbon::parse($date->tanggal_kegiatan)->format('Y-m-d');
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
