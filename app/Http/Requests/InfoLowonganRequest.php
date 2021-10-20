<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoLowonganRequest extends FormRequest
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
            'idcompany' => 'required',
            'idservicetype' => 'required',
            'idjobposition' => 'required',
            'idjoblocation' => 'required',
            'desc' => 'required',
            'openingdate' => 'required',
            'closingdate' => 'required',
            'address' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            //rename the attribute
            'title'  => 'Judul Lowongan',
            'idcompany' => 'Nama Perusahaan',
            'idservicetype' => 'Tipe Lowongan',
            'idjobposition' => 'Posisi',
            'idjoblocation' => 'Lokasi',
            'desc' => 'Deskripsi',
            'openingdate' => 'Tanggal Buka',
            'closingdate' => 'Tanggal Tutup',
            'address' => 'Alamat',
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
