<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    protected $table = 'documentations';

    protected $fillable = [
        'tanggal_kegiatan', 'foto_kegiatan', 'kategori_kegiatan', 'judul_kegiatan', 'deskripsi_kegiatan'
    ];
}
