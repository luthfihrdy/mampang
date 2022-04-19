<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Models\Skp;
use Validator;
use Auth;
use DB;

class SkpController extends Controller
{
    public function index()
    {
        $aktivitas = DB::table('aktivitas')->get();
        return view('pegawai.skp',[
            'aktivitas' => $aktivitas
        ]);
    }

    public function create() {
        $res = Skp::with('getAct')->with('getUser')->get();

        return Datatables::of($res)->editColumn('skp_date', function($date) {
            return Carbon::parse($date->skp_date)->format('Y-m-d');
         })->make(true);
    }

    public function store(Request $request) {
        //dd($request);
        // Validator::make($request->all(), [
        //     'act_id' => ['required', 'integer'],
        //     'skp_tahun' => ['required', 'string'],
        //     'skp_target' => ['required', 'integer'],
        // ]);

        $create = DB::table('skptahunan')->insert([
            'users_id'      => Auth::user()->id,
            'act_id'        => $request->act_id,
            'skp_tahun'     => $request->skp_tahun,
            'skp_target'    => $request->skp_target,
            'status'        => '1', //Waiting (default)
        ]);

        if($create){
            return response()->json(['status'=>200,'message'=>'Data Berhasil Di Input']);
        }else{
            return response()->json(['status'=>422,'message'=>$validator->messages()]);
        }
    }

    public function destroy($ids){
        $skp = Skp::find($ids);
        $success = $skp->delete();
        if($success){
            return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di Hapus']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Hapus']);  
        }
    }
}
