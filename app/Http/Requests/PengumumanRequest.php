<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengumumanRequest extends FormRequest
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
            'title'  => 'required',
            'agendadesc' => 'required',
            'schedule' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            //rename the attribute
            'title'  => 'Judul',
            'agendadesc' => 'Deskripsi',
            'schedule' => 'Jadwal'
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
