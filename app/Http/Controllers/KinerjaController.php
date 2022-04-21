<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class KinerjaController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $res = DB::select("
        SELECT CONCAT(YEAR(keg_date),' ', MONTHNAME(keg_date)) as tanggal,
        (SELECT sum(point_menit) FROM kegiatan WHERE status = 2 AND CONCAT(YEAR(keg_date),' ', MONTHNAME(keg_date)) = tanggal AND users.id = kegiatan.users_id) AS point_menit
        FROM kegiatan
        JOIN users
        ON users.id = kegiatan.users_id
        WHERE users.id = '$user_id'
        GROUP BY YEAR(keg_date), MONTHNAME(keg_date), users.id
        ORDER BY keg_date ASC");

        $pie = DB::select("
        SELECT
        (SELECT sum(point_menit) FROM kegiatan WHERE status = 2 AND users_id = users.id AND MONTH(keg_date) = MONTH(CURRENT_DATE()) AND YEAR(keg_date) = YEAR(CURRENT_DATE())) AS jumlah,
        (SELECT jmlhari * 300 FROM harikerja WHERE MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun ) - (SELECT sum(point_menit) FROM kegiatan WHERE status = 2 AND users_id = users.id AND MONTH(keg_date) = MONTH(CURRENT_DATE()) AND YEAR(keg_date) = YEAR(CURRENT_DATE())) as kurang,
        (SELECT jmlhari * 300 FROM harikerja WHERE MONTHNAME(keg_date) = bulan AND YEAR(keg_date) = tahun ) as target,
        jmlhari
        FROM kegiatan
        JOIN harikerja
        JOIN users
        ON users.id = kegiatan.users_id
        WHERE concat(YEAR(keg_date),' ',MONTHNAME(keg_date)) = concat(harikerja.tahun,' ',harikerja.bulan)
        AND MONTH(keg_date) = MONTH(CURRENT_DATE())
        AND YEAR(keg_date) = YEAR(CURRENT_DATE())
        GROUP BY MONTHNAME(keg_date);");

        return view('pegawai.ckinerja',['data'=>$res,'pie'=>$pie]);
    }

    public function lineChart() {
        return response()->json($res);
    }
}
