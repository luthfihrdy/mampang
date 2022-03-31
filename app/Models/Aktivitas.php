<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'act_nama',
        'act_waktu',
        'act_durasi',
        'act_unit',
    ];
}

