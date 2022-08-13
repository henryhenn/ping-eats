<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:50'],
            'harga' => ['required', 'integer'],
            'deskripsi' => ['required', 'max:255'],
            'url_foto' => 'required|file|mimes:png,jpg,jpeg',
            'user_id' => 'integer'
        ];
    }
}
