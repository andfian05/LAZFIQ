<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountZakat extends Model
{
    protected $table = 'count_zakats';

    protected $fillable = [
        'tanggal_cz', 'waktu_cz', 'muzakki_pertama', 'keluarga_muzakki', 'jenis_zakat', 'zakat_beras', 'zakat_uang', 'status_cz'
    ];
}
