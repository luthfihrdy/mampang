<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nrk',
        'act_id',
        'keg_date',
        'keg_jammualai',
        'keg_jamselesai',
        'poin_menit',
        'keg_notes',
        'keg_volume',
        'cacode',
        'dscode',
        'totalunit',
        'status',
    ];

    protected $dates = ['keg_date'];

    public function getUser() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
