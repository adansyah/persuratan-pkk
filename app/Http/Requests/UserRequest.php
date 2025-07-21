<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8',
            'role' => 'required|in:admin,ketua,sekretaris',
            'file' => 'nullable|mimes:jpg,jpeg,png|max:5024',
        ];
    }
}
