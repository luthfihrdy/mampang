<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Models\Skp;

class ValidatorskpController extends Controller
{
    public function index() {
        return view('validator.skpvalidasi');
    }

    public function create() {
        $res = DB::select("
                SELECT skp_tahun as tahun,
                skptahunan.id as id,
                users.id as users_id,
                users.name,
                skptahunan.created_at,
                (SELECT count(*) FROM skptahunan WHERE status = 1 AND users.id = skptahunan.users_id and skptahunan.skp_tahun = tahun) AS waiting,
                (SELECT count(*) FROM skptahunan WHERE status = 2 AND users.id = skptahunan.users_id and skptahunan.skp_tahun = tahun) AS approved,
                (SELECT count(*) FROM skptahunan WHERE status = 3 AND users.id = skptahunan.users_id and skptahunan.skp_tahun = tahun) AS rejected
                FROM skptahunan
                JOIN users
                ON users.id = skptahunan.users_id
                GROUP BY skp_tahun, users_id;
        ");

        return Datatables::of($res)->editColumn('created_at', function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
         })->make(true);
    }

    public function detail(Request $request) {
       
        $res = Skp::with('getAct')->with('getUser')->where('skp_tahun',$request->tahun)->where('users_id',$request->users_id)->where('status',1)->get();
        //dd($res);
        return view('validator.skpvalidasi_detail',['data' => $res]);
    }

    public function validasi($id, $status) {
        $skp = Skp::find($id);
        if($status == 'approve'){
            $skp->status = '2';
        }else if($status == 'reject') {
            $skp->status = '3';
        }
        
        $success = $skp->save();

        if($success){
            return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di validasi']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Approve']);  
        }
    }
}
