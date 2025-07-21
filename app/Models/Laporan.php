<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jenis_surat',
        'tgl_surat_masuk',
        'tgl_surat_keluar',
        'keterangan',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }

    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }
}
