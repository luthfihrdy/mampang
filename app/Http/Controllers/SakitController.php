<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SakitController extends Controller
{
    public function index()
    {
        return view('pegawai.sakit');
    }
}
