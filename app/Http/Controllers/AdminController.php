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
        $data = DB::table('kegiatans')
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
}
