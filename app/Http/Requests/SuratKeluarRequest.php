<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'no_surat' => 'nullable',
            'nama_surat' => 'nullable|max:255',
            'tgl_surat' => 'nullable|date',
            'tgl_dikirim' => 'nullable|date',
            'keterangan' => 'nullable|max:255',
            'perihal' => 'nullable|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,png|max:2048',
            'user_id' => 'nullable|exists:users,id',
            'status' => 'nullable|in:proses,dibatalkan,diterima',
        ];
    }
}
