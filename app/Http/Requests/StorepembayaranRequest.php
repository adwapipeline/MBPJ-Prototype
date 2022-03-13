<?php

namespace App\Http\Requests;

use App\Models\pembayaran;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorepembayaranRequest extends FormRequest
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
            'namaPembayar' => [
                'string',
                'required',
            ],
            // 'tarikhPembayaran' => [
            //     // 'date_format:' . config('panel.date_format'),
            //     'nullable',
            // ],

            'tarikhPembayaran' => [
                'string',
                'required',
            ],
            'kaedahPembayaran' => [
                'string',
                'required',
            ],
            'totalPembayaran' => [
                'string',
                'required',
            ],
        ];
    }
}
