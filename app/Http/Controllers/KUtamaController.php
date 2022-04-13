<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KUtamaController extends Controller
{
    public function index()
    {
        return view('pegawai.kegutama');
    }
}
