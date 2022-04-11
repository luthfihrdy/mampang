<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'users_id',
        'act_id',
        'keg_date',
        'keg_jammulai',
        'keg_jamselesai',
        'point_menit',
        'keg_notes',
        'keg_volume',
        'cacode',
        'totalunit',
        'status',
    ];

    protected $dates = ['keg_date'];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function getAct() {
        return $this->belongsTo(Aktivitas::class, 'act_id', 'act_id');
    }
}