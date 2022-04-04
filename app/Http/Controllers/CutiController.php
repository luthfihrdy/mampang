<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        return view('pegawai.cuti');
    }

    public function create()
    {
        $res = DB::table('cuti')->where('user_id',Auth::user()->id)->get();
        return Datatables::of($res)->editColumn('cuti_mulai', function($date) {
            return Carbon::parse($date->cuti_mulai)->format('Y-m-d');
         })->make(true);
    }

}
