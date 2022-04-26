<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendidikan extends Model
{
    use HasFactory;

    protected $table = 'data_pendidikan';

    protected $fillable = [
        'users_id',
        'jenjang',
        'education',
        'tamat',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
