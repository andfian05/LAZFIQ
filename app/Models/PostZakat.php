<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostZakat extends Model
{
    protected $table = 'post_zakats';

    protected $fillable = [
        'tanggal_pz', 'zakat_uang', 'zakat_beras', 'mustahiq_pz', 'status_pz'
    ];
}
