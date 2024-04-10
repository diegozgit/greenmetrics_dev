<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateBranchRequest extends FormRequest
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
            'id' => 'required|exists:users,id',
            'indirizzo' => 'required|string',
            'civico' => 'required|string',
            'CAP' => 'required|string',
            'comune' => 'required|string',
            'provincia' => 'required|string',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Verifica la tua regola personalizzata qui
            $this->validateUniqueBranch();
        });
    }

    /**
     * Valida la regola personalizzata per evitare la duplicazione del branch.
     *
     * @return void
     */
    protected function validateUniqueBranch()
    {
        $indirizzo = $this->input('indirizzo');
        $civico = $this->input('civico');
        $comune = $this->input('comune');
        $provincia = $this->input('provincia');

        $existingBranch = \App\Models\Branch::where([
            'indirizzo' => $indirizzo,
            'civico' => $civico,
            'comune' => $comune,
            'provincia' => $provincia,
        ])->first();

        if ($existingBranch) {
            $this->merge([
                'indirizzo' => null,
                'civico' => null,
                'comune' => null,
                'provincia' => null,
            ]);

            $validator = $this->getValidatorInstance();
            $validator->errors()->add('indirizzo', 'La sede o proprietà da lei inserita esiste già.');
        }
    }
}
