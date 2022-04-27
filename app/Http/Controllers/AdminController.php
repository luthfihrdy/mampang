<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Datadiri;
use App\Models\DataAlamat;
use App\Models\DataDokumen;
use App\Models\DataPosisi;
use App\Models\DataPendidikan;
use App\Models\DataSip;
use App\Models\DataStr;
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
        $res = DB::table('users')
        //->join('data_posisi','data_posisi.users_id','=','users.id')
        ->get();
        return Datatables::of($res)->make(true);
    }

    public function createUser(Request $request) {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'name_gelar' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'integer', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_nip_nrk' => ['required'],
        ]);

        $createUser = User::create([
            'nrk'   => $request->nrk,
            'name' => $request->name,
            'name_gelar' => $request->name_gelar,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $createDatadiri = Datadiri::create([
            'users_id' =>   $createUser->id,
            'id_nip_nrp' => $request->id_nip_nrp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_nikah'   => $request->status_nikah,
            'anak'   => $request->anak,
        ]);

        $createDataalamat = DataAlamat::create([
            'users_id' =>   $createUser->id,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan'   => $request->kecamatan,
            'provinsi'   => $request->provinsi,
            'kota'   => $request->kota,
        ]);

        $createDataDokumen = DataDokumen::create([
            'users_id' =>   $createUser->id,
            'nik' => $request->nik,
            'bpjs_kes' => $request->bpjs_kes,
            'bpjs_ket' => $request->bpjs_ket,
            'npwp' => $request->npwp,
            'no_rek' => $request->no_rek,
        ]);

        $createDataPosisi = DataPosisi::create([
            'users_id' =>   $createUser->id,
            'fasyankes' => $request->fasyankes,
            'jabatan' => $request->jabatan,
            'unit_kerja' => $request->unit_kerja,
            'formasi_jabatan' => $request->formasi_jabatan,
            'jenis_jabatan' => $request->jenis_jabatan,
            'status_pegawai' => $request->status_pegawai,
            'tmt_akhir' => $request->tmt_akhir,
            'tmt_awal' => $request->tmt_awal,
            'rank' => $request->rank,
            'group' => $request->group,

        ]);

        $createDataPendidikan = DataPendidikan::create([
            'users_id' =>   $createUser->id,
            'jenjang' => $request->jenjang,
            'education' => $request->education,
            'tamat' => $request->tamat,
        ]);

        if(!empty($request->sip_no)){
            $createDataSip = DataSip::create([
                'users_id' =>   $createUser->id,
                'sip_no' => $request->sip_no,
                'sip_terbit' => $request->sip_terbit,
                'sip_akhir' => $request->tamat,
            ]);
        }
        
        if(!empty($request->str_no)){
            $createDataStr = DataStr::create([
                'users_id' => $createUser->id,
                'str_no' => $request->str_no,
                'str_terbit' => $request->str_terbit,
                'str_akhir' => $request->str_akhir,
            ]);
        }

        if($createDataPendidikan){
            return response()->json(['status'=>200,'message'=>'Data Berhasil DiInput']);
        }else{
            return response()->json(['status'=>422,'message'=>'Data Gagal Di Input']);
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
        $success = DB::table('data_diri')->where('users_id',$ids)->delete();
        $sucess = DB::table('data_alamat')->where('users_id',$ids)->delete();
        $sucess = DB::table('data_dokumen')->where('users_id',$ids)->delete();
        $sucess = DB::table('data_posisi')->where('users_id',$ids)->delete();
        $sucess = DB::table('data_pendidikan')->where('users_id',$ids)->delete();
        $sucess = DB::table('data_sip')->where('users_id',$ids)->delete();
        $sucess = DB::table('data_str')->where('users_id',$ids)->delete();
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
        // $res = DB::table('kegiatan')
        //         ->join('users','users.id','=','kegiatan.user_id')
        //         ->where('status','Approved')
        //         ->get([
        //             'users.name as name',
        //             'tanggal_kegiatan',
        //             'keg_jammulai',
        //             'keg_jamselesai',
        //             'kegiatan',
        //             'status',
        //         ]);
        $res = Kegiatan::with('getUser')->with('getAct')->get();
        //$res = Kegiatan::with('getUser')->where('status','Approved')->get();
        return Datatables::of($res)->editColumn('keg_date', function($date) {
            return Carbon::parse($date->keg_date)->format('Y-m-d');
         })->make(true);
    }

    public function filter(Request $request) {
        $data = Kegiatan::with('getUser')->with('getAct');
        // $data = DB::table('
        // ')
        //         ->join('users','users.id','=','kegiatans.user_id')
        //         ->where('status','Approved');
                
        if(!empty($request->user_id)){
            $data->where('users_id',$request->user_id);
        }

        if(!empty($request->awal || $request->akhir)){
            $data->whereBetween('keg_date', [$request->awal, $request->akhir]);
        }
        
        // $data->get([
        //     'users.name as name',
        //     'tanggal_kegiatan',
        //     'jam_awal',
        //     'jam_akhir',
        //     'kegiatan',
        //     'status',
        // ]);
        $data->get();
        // return Datatables::of($data)->editColumn('keg_date', function($date) {
        //     return Carbon::parse($date->tanggal_kegiatan)->format('Y-m-d');
        // })->make(true);
        return Datatables::of($data)->make(true);
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
