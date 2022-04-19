<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skp extends Model
{
    use HasFactory;

    protected $table = 'skptahunan';

    protected $fillable = [
        'users_id',
        'act_id',
        'skp_tahun',
        'skp_target',
        'status',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function getAct() {
        return $this->belongsTo(Aktivitas::class, 'act_id', 'act_id');
    }
}
