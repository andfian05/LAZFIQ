<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostQurban extends Model
{
    protected $table = 'post_qurbans';

    protected $fillable = [
        'tanggal_pq', 'qurban_sapi', 'qurban_kambing', 'mustahiq_pq', 'status_pq'
    ];
}
