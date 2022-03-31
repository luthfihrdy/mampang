<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;

class AktivitasController extends Controller
{
    public function showAktivitas() {
        // $user = User::all();
        return view('aktivitas.home');
    }

    public function getAktivitas(){
        $res = DB::table('aktivitas')->get();
        return Datatables::of($res)->make(true);
    }
}
