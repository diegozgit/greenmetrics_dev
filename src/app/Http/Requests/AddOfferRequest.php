<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOfferRequest extends FormRequest
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
            'idFornitore' => 'required|exists:suppliers,idFornitore',
            'nomeOfferta' => 'required|string',
            'utility' => 'required|string',
            'prezzoGas' => 'nullable|numeric',
            'prezzoLuce' => 'nullable|numeric',
            'quotaFissa' => 'required|numeric',
        ];
    }
}
