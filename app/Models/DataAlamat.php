<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlamat extends Model
{
    use HasFactory;

    protected $table = 'data_alamat';

    protected $fillable = [
        'users_id',
        'no_telp',
        'alamat',
        'kelurahan',
        'kecamatan',
        'provinsi',
        'kota',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
