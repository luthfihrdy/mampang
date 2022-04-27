<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPosisi extends Model
{
    use HasFactory;

    protected $table = 'data_posisi';

    protected $fillable = [
        'users_id',
        'fasyankes',
        'jabatan',
        'unit_kerja',
        'formasi_jabatan',
        'jenis_jabatan',
        'status_pegawai',
        'tmt_awal',
        'tmt_akhir',
        'rank',
        'group',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
