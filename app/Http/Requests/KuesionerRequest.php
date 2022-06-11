<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KuesionerRequest extends FormRequest
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
            //set validation rules
            'namalengkap'=> 'required',
            'tahunlulus' => 'required|date_format:Y',

        ];
    }

    public function attributes()
    {
        return [
            //rename the attribute
            'namalengkap' => 'Nama Lengkap',
            'tahunlulus' => 'Tahun Lulus',
        ];
    }

    public function messages()
    {
        //error messages
        return [
            '*.required' => ':attribute wajib diisi',  // :attribute -> cara memanggil atribut
        ];
    }
}