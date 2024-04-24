<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:suppliers,email|unique:users,email|unique:admins,email',
            'username' => 'required|unique:suppliers,username|unique:users,username|unique:admins,username',
            'numTelefono' => 'required|numeric',
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
