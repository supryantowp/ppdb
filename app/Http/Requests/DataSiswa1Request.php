<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataSiswa1Request extends FormRequest
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
            'nisn' => 'required|min:10',
            'no_kk' => 'required|max:16',
            'nik_siswa' => 'required|max:16',
            'nama_siswa' => 'required',
            'no_telepon_siswa' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|min:10',
            'tanggal_lahir' => 'required',
            'alamat_siswa' => 'required|min:10',
            'anak_ke' => 'required',
            'jumlah_saudara' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nisn.required'     => 'Nisn harus diisi',
            'no_kk.required'    => 'No kk harus diisi',
            'nik_siswa.required'    => 'Nik siswa harus diisi',
            'nama_siswa.required'    => 'Nama siswa harus diisi',
            'no_telepon_siswa.required' => 'no telepon harus diisi',
            'agama.required'    => 'agama harus diisi',
            'jenis_kelamin.required'    => 'Jenis kelamin harus diisi',
            'tempat_lahir.required'    => 'Tempat lahir harus diisi',
            'tanggal_lahir.required'    => 'Tanggal lahir harus diisi',
            'alamat_siswa.required'    => 'Alamat siswa harus diisi',
            'anak_ke.required'    => 'Anak ke harus diisi',
            'jumlah_saudara.required'    => 'Jumlah saudara harus diisi',
            'hobi.required'    => 'Hobi harus diisi',
            'cita_cita.required'    => 'Cita-Cita harus diisi',
            'nisn.min'          => 'Nisn minimal 10 karakter',
            'no_kk.max'    => 'Nisn maksimal 16 karakter',
            'tempat_lahir.min'    => 'Tempat lahir minimal 10 karakter',
            'alamat_siswa.min'    => 'Alamat siswa minimal 10 karakter',
        ];
    }
}
