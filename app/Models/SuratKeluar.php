<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat-keluars';
    protected $fillable = [
        'no_surat',
        'nama_surat',
        'tgl_surat',
        'tgl_dikirim',
        'tujuan',
        'keterangan',
        'perihal',
        'file',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
