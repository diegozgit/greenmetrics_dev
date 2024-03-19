<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|unique:users,username',
            'nome' => 'nullable',
            'cognome' => 'nullable',
            'ragioneSociale' => 'required',
            'indirizzo' => 'required',
            'civico' => 'required|min:1|numeric',
            'comune' => 'required',
            'provincia' => 'required',
            'nazione' => 'required',
            'codFiscale' => [
                'required',
                'unique:users,codFiscale',
                'regex:/^[A-Z]{6}[0-9]{2}[A-Z]{1}[0-9]{2}[A-Z]{1}[0-9]{3}[A-Z]$/'
            ],
            'numTelefono' => 'nullable|numeric',
            'CAP' => 'required|numeric|digits:5',
            'partitaIva' => 'numeric|digits:11|unique:users,partitaIva',
            'password' => 'required|min:8',
            /*
            'password' => [
            'required',
            'min:8',
            'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/',
            'confirmed'
            ],
            */
            'password_confirmation' => 'required|same:password'
        ];
    }
}
