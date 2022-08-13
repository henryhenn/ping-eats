<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'nama_dagang' => 'required|string|max:100',
            'lokasi' => 'required|max:255',
            'email' => 'required|email|max:100',
            'password' => 'nullable|min:8|max:255',
            'no_telp' => 'required|max:13',
            'profpict' => 'nullable|file|mimes:png,jpg,jpeg',
        ];
    }
}
