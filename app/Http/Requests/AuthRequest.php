<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required|string|max:55',
            'nama_dagang' => 'nullable|string|max:55',
            'lokasi' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'no_telp' => 'required|max:13',
            'profpict' => 'required|max:2048|file|mimes:png,jpg,jpeg',
            'role' => 'required'
        ];
    }
}
