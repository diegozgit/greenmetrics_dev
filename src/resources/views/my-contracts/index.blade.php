@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>I tuoi contratti</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <!-- Mostra qui l'elenco dei contratti dell'utente -->
                    @if (count($contracts) > 0)
                        <ul class="list-group">
                            @foreach ($contracts as $contract)
                                <li class="list-group-item">
                                    <strong>Sede:</strong> {{ App\Models\Branch::getBranchByIdSede($contract->idSede) }}
                                    <br>
                                    <strong>Data Inizio:</strong> {{ $contract->dataInizioValidita }}
                                    <br>
                                    <strong>Data Fine:</strong> {{ $contract->dataFineValidita }}
                                    <br>
                                    <strong>Descrizione Offerta:</strong> {{ $contract->descrizioneOfferta }}
                                    <br>
                                    <strong>Utility:</strong> {{ $contract->utility }}
                                    <br>
                                    <strong>Stato Contratto:</strong> {{ $contract->statoContratto }}
                                    <br>
                                    <strong>Tipo Pagamento:</strong> {{ $contract->tipoPagamento }}
                                    <br>
                                    <strong>Potenza Imp:</strong> {{ $contract->potenzaImp }}
                                    <br>
                                    <strong>Pot Disp:</strong> {{ $contract->potDisp }}
                                    <br>
                                    <strong>Energia Anno:</strong> {{ $contract->energiaAnno }}
                                    <br>
                                    <strong>Gas Anno:</strong> {{ $contract->gasAnno }}
                                    <br>
                                    <strong>Uso Cottura Cibi:</strong>
                                    {{ $contract->usoCotturaCibi === null ? 'Non specificato' : ($contract->usoCotturaCibi == 1 ? 'Sì' : 'No') }}
                                    <br>
                                    <strong>Produzione Acqua Calda Sanitaria:</strong>
                                    {{ $contract->produzioneAcquaCaldaSanitaria === null ? 'Non specificato' : ($contract->produzioneAcquaCaldaSanitaria == 1 ? 'Sì' : 'No') }}
                                    <br>
                                    <strong>Riscaldamento Individuale:</strong>
                                    {{ $contract->riscaldamentoIndividuale === null ? 'Non specificato' : ($contract->riscaldamentoIndividuale == 1 ? 'Sì' : 'No') }}
                                    <br>
                                    <strong>Uso Commerciale:</strong>
                                    {{ $contract->usoCommerciale === null ? 'Non specificato' : ($contract->usoCommerciale == 1 ? 'Sì' : 'No') }}
                                    <br>
                                    <form action="{{ route('delete-contract') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="contract_id" value="{{ $contract->idContratto }}">
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Nessun contratto disponibile.</p>
                    @endif
                </div>
            </div>
        @endauth
    </div>
@endsection
