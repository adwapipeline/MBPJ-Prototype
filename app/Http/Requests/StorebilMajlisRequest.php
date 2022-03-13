<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorebilMajlisRequest extends FormRequest
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
            'tajuk' => [
                'string',
                'required',
            ],

            'jenisBilMajlis' => [
                'string',
                'required',
            ],
            'tarikh' => [
                'string',
                'required',
            ],

            'totalBayaran' => [
                'string',
                'required',
            ],
        ];
    }
}
