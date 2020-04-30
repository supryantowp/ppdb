<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataSiswa2Request extends FormRequest
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
            'nik_ayah' => 'required|min:10',
            'nama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'no_telepon_ayah' => 'required',

            'nik_ibu' => 'required|min:10',
            'nama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'no_telepon_ibu' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nik_ayah.required' => 'nik ayah harus di isi',
            'nik_ayah.min' => 'nik ayah minimal 10 karakter',
            'nama_ayah.min' => 'nama ayah harus di isi',
            'pendidikan_ayah.required' => 'pendidikan ayah harus di isi',
            'pejerjaan_ayah.required' => 'pekerjaan ayah harus di isi',
            'penghasilan_ayah.required' => 'penghasilan ayah harus di isi',
            'no_telepon_ayah.required' => 'no telepon ayah harus di isi',

            'nik_ibu.required' => 'nik ibu harus di isi',
            'nik_ibu.min' => 'nik ibu minimal 10 karakter',
            'nama_ibu.min' => 'nama ibu harus di isi',
            'pendidikan_ibu.required' => 'pendidikan ibu harus di isi',
            'pejerjaan_ibu.required' => 'pekerjaan ibu harus di isi',
            'penghasilan_ibu.required' => 'penghasilan ibu harus di isi',
            'no_telepon_ibu.required' => 'no telepon ibu harus di isi',

        ];
    }
}
