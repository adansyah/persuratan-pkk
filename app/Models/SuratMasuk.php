<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat-masuks';
    protected $fillable = [
        'no_surat',
        'nama_surat',
        'tgl_surat',
        'tgl_diterima',
        'asal',
        'perihal',
        'file',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function suratKeluar()
    {
        return $this->hasMany(SuratKeluar::class);
    }
}
