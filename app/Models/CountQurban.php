<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountQurban extends Model
{
    protected $table = 'count_qurbans';

    protected $fillable = [
        'tanggal_cq', 'kategori_qurban', 'jumlah_sapi', 'jumlah_kambing', 'nama_yg_qurban', 'bukti_cq', 'status_cq'
    ];
}
