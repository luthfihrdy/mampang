<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_kegiatan',
        'jam_awal',
        'jam_akhir',
        'point_menit',
        'kegiatan',
        'status',
    ];

    protected $dates = ['tanggal_kegiatan'];

    public function getUser() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
