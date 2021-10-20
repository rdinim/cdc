<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BimbinganKarirRequest extends FormRequest
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
            'idcategory' => 'required',
            'agendadesc' => 'required',
            'schedule' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title'  => 'Judul',
            'idcategory' => 'Kategori',
            'agendadesc' => 'Deskripsi',
            'schedule' => 'Jadwal'
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attribute wajib diisi',
        ];
    }
}
