<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSip extends Model
{
    use HasFactory;

    protected $table = 'data_sip';

    protected $fillable = [
        'users_id',
        'sip_no',
        'sip_terbit',
        'sip_akhir',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
