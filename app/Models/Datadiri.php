<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datadiri extends Model
{
    use HasFactory;

    protected $table = 'data_diri';

    protected $fillable = [
        'users_id',
        'gender',
        'id_nip_nrp',
        'tempat_lahir',
        'tanggal_lahir',
        'status_nikah',
        'anak',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
