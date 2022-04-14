<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kegiatan;
use Yajra\DataTables\DataTables;
use Validator;
use Hash;
use DB;
use Carbon\Carbon;
use Auth;

class AdminController extends Controller
{
    public function getHariKerja(){
        $res = DB::table('harikerja')->get();
        return Datatables::of($res)->make(true);
    }

    public function createHariKerja(Request $request) {
        Validator::make($request->all(), [
            'tahun' => ['required'],
            'bulan' => ['required'],
            'jmlhari' => ['required', 'integer'],
        ]);

        $data = [
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'jmlhari' => $request->jmlhari,
        ];

        $check = DB::table('harikerja')
                ->where('tahun','=', $request->tahun)
                ->where('bulan','=', $request->bulan)
                ->first();
        
        if($check === null) {
            $create = DB::table('harikerja')->insert($data);

            if($create){
                return response()->json(['status'=>200,'message'=>'Data Berhasil DiInput']);
            }else{
                return response()->json(['status'=>422,'message'=>$validator->messages()]);
            }

        }else{
            return response()->json(['status'=>422,'message'=>'Data sudah ada dalam database']);
        }
    }

    public function updateHariKerja(Request $request){
        $res = DB::table('harikerja')->where('id',$request->id)->get();
        return response()->json($res);
    }

    public function editHariKerja(Request $request) {
        Validator::make($request->all(), [
            'jmlhari' => ['required', 'integer'],
        ]);

        //$data = DB::table('harikerja')->where($request->id)->first();
        
        $data = [
            'jmlhari' => $request->jmlhari,
        ];

        $success = DB::table('harikerja')
        ->where('id',$request->id)->update($data);

        if($success){
            return response()->json(['status'=>200,'message'=>'Data berhasil di ubah']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data gagal di ubah']);
        }
    }

    public function destroyHariKerja($ids){
        $hari = DB::table('harikerja')->delete($ids);
        if($hari){
            return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di Hapus']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Hapus']);  
        }
    }

    public function showUser() {
        // $user = User::all();
        return view('admin.user');
    }

    public function getUser(){
        $res = DB::table('users')->get();
        return Datatables::of($res)->make(true);
    }

    public function createUser(Request $request) {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'integer', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $create = User::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($create){
            return response()->json(['status'=>200,'message'=>'Data Berhasil DiInput']);
        }else{
            return response()->json(['status'=>422,'message'=>$validator->messages()]);
        }
    }

    public function updateUser(Request $request) {
        $res = DB::table('users')->where('id',$request->id)->get();
        return response()->json($res);
    }

    public function editUser(Request $request) {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'integer', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $data = User::find($request->id);

        $data->name = $request->name;
        $data->role_id = $request->role_id;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $success = $data->save();

        if($success){
            return response()->json(['status'=>200,'message'=>'Data Berhasil Di Ubah!']);
        }else{
            return response()->json(['status'=>422,'message'=>$validator->messages()]);
        }
    }
    
    public function destroyUser($ids) {
        $user = User::find($ids);
        $success = $user->delete();
        if($success){
            return response()->json(['success'=>true, 'status'=>200,'message'=>'Data Berhasil Di Hapus']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Hapus']);  
        }
    }

    public function report() {
        // $report = Kegiatan::with('getUser')->where('status','Approved')->get();
        return view('admin.report');
    }
    
    public function getData() {
        $res = DB::table('kegiatans')
                ->join('users','users.id','=','kegiatans.user_id')
                ->where('status','Approved')
                ->get([
                    'users.name as name',
                    'tanggal_kegiatan',
                    'jam_awal',
                    'jam_akhir',
                    'kegiatan',
                    'status',
                ]);
        //$res = Kegiatan::with('getUser')->where('status','Approved')->get();
        return Datatables::of($res)->editColumn('tanggal_kegiatan', function($date) {
            return Carbon::parse($date->tanggal_kegiatan)->format('Y-m-d');
         })->make(true);
    }

    public function filter(Request $request) {
        $data = DB::table('
        ')
                ->join('users','users.id','=','kegiatans.user_id')
                ->where('status','Approved');
                
        if(!empty($request->user_id)){
            $data->where('user_id',$request->user_id);
        }

        if(!empty($request->awal || $request->akhir)){
            $data->whereBetween('tanggal_kegiatan', [$request->awal, $request->akhir]);
        }
        
        $data->get([
            'users.name as name',
            'tanggal_kegiatan',
            'jam_awal',
            'jam_akhir',
            'kegiatan',
            'status',
        ]);
        return Datatables::of($data)->editColumn('tanggal_kegiatan', function($date) {
            return Carbon::parse($date->tanggal_kegiatan)->format('Y-m-d');
        })->make(true);
    }

    public function getUserJson() {
        if(Auth::user()->role_id == 1){
            $user = User::where('role_id', 3)->get();
        }else{
            $user = null;
        }     
        return response()->json($user);
    }

    public function showHari() {
        // $user = User::all();
        return view('admin.harikerja');
    }

    public function getHari(){
        $res = DB::table('harikerja')->get();
        return Datatables::of($res)->make(true);
    }

    public function createHari(Request $request) {
        Validator::make($request->all(), [
            'id' => ['required', 'integer'],
            'tahun' => ['required', 'integer'],
            'bulan' => ['required', 'integer', 'min:1'],
            'jmlhari' => ['required', 'integer', 'min:1'],
            
        ]);

        $create = User::create([
            'id' => $request->id,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'jmlhari' => $request->jmlhari,
        ]);

        if($create){
            return response()->json(['status'=>200,'message'=>'Data Berhasil DiInput']);
        }else{
            return response()->json(['status'=>422,'message'=>$validator->messages()]);
        }
    }
}
