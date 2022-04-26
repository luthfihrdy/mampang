<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDokumen extends Model
{
    use HasFactory;

    protected $table = 'data_dokumen';

    protected $fillable = [
        'users_id',
        'nik',
        'bpjs_kes',
        'bpjs_ket',
        'npwp',
        'no_rek',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
