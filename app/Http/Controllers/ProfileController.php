<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $res = User::leftJoin('data_diri','data_diri.users_id','=','users.id')
                ->leftJoin('data_alamat','data_alamat.users_id','=','users.id')
                ->leftJoin('data_dokumen','data_dokumen.users_id','=','users.id')
                ->leftJoin('data_posisi','data_posisi.users_id','=','users.id')
                ->where('users.id',Auth::user()->id)
                ->get([
                    'name',
                    'name_gelar',
                    'email',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'id_nip_nrp',
                    'gender',
                    'nrk',
                    'no_telp',
                    'alamat',
                    'kelurahan',
                    'kecamatan',
                    'provinsi',
                    'kota',
                    'nik',
                    'bpjs_kes',
                    'bpjs_ket',
                    'npwp',
                    'no_rek',
                    'rank',
                    'jabatan',
                    'formasi_jabatan',
                    'jenis_jabatan',
                    'status_pegawai',
                    'unit_kerja',
                    'tmt_awal',
                    'tmt_akhir',
                    'fasyankes',
                    'group',
                    
                ]);
        return view('pegawai.profile',['data' => $res]);
    }
}
