<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiPpdbRequest extends FormRequest
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
            'nama' => 'required',
            'jumlah_bayar' => 'required',
            'bank_id' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'nama.required'  => 'nama tidak boleh kosong',
            'jumlah_bayar.required' => 'bayar tidak boleh kosong',
            'bank_id.required' => 'bank tidak boleh kosong',
            'bukti_pembayaran.required' => 'bukti tidak boleh kosong'
        ];
    }
}
