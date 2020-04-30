<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataSiswa3Request extends FormRequest
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
            'npsn_sekolah' => 'required',
            'asal_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'no_skhun' => 'required',
            'tinggal_dengan' => 'required',
            'jurusan_pilihan_pertama' => 'required',
            'jurusan_pilihan_kedua' => 'required',
            'foto_siswa' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'npsn_sekolah.required' => 'npsn sekolah tidak boleh kosong',
            'asal_sekolah.required' => 'asal sekolah tidak boleh kosong',
            'alamat_sekolah.required' => 'alamat sekolah tidak boleh kosong',
            'no_skhun.required' => 'no skhun tidak boleh kosong',
            'tinggal_dengan.required' => 'tinggal dengan tidak boleh kosong',
            'jurusan_pilihan_pertama.required' => 'jurusan pilihan pertama  tidak boleh kosong',
            'jurusan_pilihan_kedua.required' => 'jurusan pilihan kedua  tidak boleh kosong',
            'foto_siswa.required'    => 'Foto siswa harus diisi',
            'foto_siswa.image' => 'Foto harus format jpeg, png, jpg'
        ];
    }
}
