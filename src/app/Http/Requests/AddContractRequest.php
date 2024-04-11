<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddContractRequest extends FormRequest
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
            'idSede' => 'nullable|exists:branches,idSede',
            'id' => 'required|exists:users,id',
            'idOfferta' => 'required|exists:offers,idOfferta',
            'nomeOfferta' => 'required|string',
            'utility' => 'required|string',
            'prezzoGas' => 'nullable|numeric',
            'prezzoLuce' => 'nullable|numeric',
            'quotaFissa' => 'required|numeric',
            'indirizzo' => 'required|string',
            'civico' => 'required|string',
            'CAP' => 'required|string',
            'comune' => 'required|string',
            'provincia' => 'required|string',
            'codPod' => 'required|string',
            'dataInizioValidita' => 'required|date',
            'dataFineValidita' => 'nullable|date',
            /*
            'dataRichiestaServizio' => 'required|date',
            'dataInizioValidita' => 'required|date',
            'dataFineValidita' => 'required|date',
            'descrizioneOfferta' => 'required|string',
            'utility' => 'required|string',
            'statoContratto' => 'required|string',
            'tipoPagamento' => 'required|string',
            'potenzaImp' => 'required|numeric',
            'potDisp' => 'required|numeric',
            'energiaAnno' => 'nullable|integer',
            'gasAnno' => 'nullable|integer',
            'usoCotturaCibi' => 'nullable|integer',
            'produzioneAcquaCaldaSanitaria' => 'nullable|integer',
            'riscaldamentoIndividuale' => 'nullable|integer',
            'usoCommerciale' => 'nullable|integer',
            */
        ];
    }
}
