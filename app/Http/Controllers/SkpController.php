<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkpController extends Controller
{
    public function index()
    {
        return view('pegawai.skp');
    }
}
