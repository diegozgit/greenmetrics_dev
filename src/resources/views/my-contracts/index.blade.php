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
                                    <strong>Nome Offerta:</strong> {{ $contract->nomeOfferta }}
                                    <br>
                                    <strong>Tipo Contratto:</strong> {{ $contract->utility }}
                                    <br>
                                    <strong>Prezzo Gas:</strong> {{ $contract->prezzoGas }}
                                    <br>
                                    <strong>Prezzo Luce:</strong> {{ $contract->prezzoLuce }}
                                    <br>
                                    <strong>Quota Fissa:</strong> {{ $contract->quotaFissa }}
                                    <br>
                                    <strong>Indirizzo:</strong> {{ $contract->branch->indirizzo }}
                                    {{ $contract->branch->civico }}, {{ $contract->branch->comune }},
                                    {{ $contract->branch->CAP }},
                                    {{ $contract->branch->provincia }}
                                    <br>
                                    <strong>Codice POD:</strong> {{ $contract->codPod }}
                                    <br>
                                    <strong>Data inizio validità:</strong> {{ $contract->dataInizioValidita }}
                                    <br>
                                    <strong>Data fine validità:</strong>
                                    @if (empty($contract->dataFineValidita))
                                        Indeterminata
                                    @else
                                        {{ $contract->dataFineValidita }}
                                    @endif
                                    <form action="{{ route('delete-contract') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="contract_id" value="{{ $contract->idContratto }}">
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </li>
                                <br>
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
