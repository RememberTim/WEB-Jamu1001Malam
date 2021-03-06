<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'picturePath' => 'image',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'harga' => 'required|integer',
            'rating' => 'required|numeric',
            'tipe' => '',
            'stok' => '',
            'keuntungan' => 'required|integer'

        ];
    }
}
