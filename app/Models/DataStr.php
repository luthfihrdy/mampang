<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStr extends Model
{
    use HasFactory;

    protected $table = 'data_str';

    protected $fillable = [
        'users_id',
        'str_no',
        'str_terbit',
        'str_akhir',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
