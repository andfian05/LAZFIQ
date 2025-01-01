<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostInfaq extends Model
{
    protected $table = 'post_infaqs';

    protected $fillable = [
        'tanggal_pi', 'debit_pi', 'kredit_pi', 'saldo_akhir_pi', 'status_pi'
    ];
}
