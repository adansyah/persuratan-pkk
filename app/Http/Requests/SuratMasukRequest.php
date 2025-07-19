<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'no_surat' => 'required',
            'nama_surat' => 'required|max:255',
            'tgl_surat' => 'required|date',
            'tgl_diterima' => 'required|date',
            'asal' => 'required|max:255',
            'perihal' => 'required|max:255',
            'file' => 'required|mimes:pdf,doc,docx,png|max:2048',
            'user_id' => 'nullable|exists:users,id',
            'status' => 'nullable|in:proses,dibatalkan,diterima',
        ];
    }
}
