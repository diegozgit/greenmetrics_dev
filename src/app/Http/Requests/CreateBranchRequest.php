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
            'descrizione' => 'required|string',
            'indirizzo' => 'required|string',
            'civico' => 'required|string',
            'CAP' => 'required|string',
            'localita' => 'required|string',
            'provincia' => 'required|string',
            'nazione' => 'required|string',
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
        $localita = $this->input('localita');
        $provincia = $this->input('provincia');
        $nazione = $this->input('nazione');

        $existingBranch = \App\Models\Branch::where([
            'indirizzo' => $indirizzo,
            'civico' => $civico,
            'localita' => $localita,
            'provincia' => $provincia,
            'nazione' => $nazione,
        ])->first();

        if ($existingBranch) {
            $this->merge([
                'indirizzo' => null,
                'civico' => null,
                'localita' => null,
                'provincia' => null,
                'nazione' => null,
            ]);

            $validator = $this->getValidatorInstance();
            $validator->errors()->add('indirizzo', 'La sede da lei inserita esiste già.');
        }
    }
}
