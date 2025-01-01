<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountInfaq extends Model
{
    protected $table = 'count_infaqs';

    protected $fillable = [
        'tanggal_ci', 'waktu_ci', 'debit_ci', 'kredit_ci', 'keterangan_ci', 'bukti_ci', 'saldo_akhir_ci', 'status_ci'
    ];
}
