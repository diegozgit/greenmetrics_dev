@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Calcolo Carbon Footprint:</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __("Inserisci le informazioni richieste per scoprire la quantità di diossido di carbonio prodotta nell'ultimo mese:") }}
                        </div>

                        <form action="{{ route('estimate') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                        <br>
                                        Mediamente un italiano produce circa 461Kg di CO2 al mese.
                                        <br>
                                        Questo calcolatore non prende conto della CO2 prodotta da alimentazione e rifiuti, che
                                        comprende mediamente il 25% della C02 prodotta.
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        ERRORE!
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="monthlyElectricInput" class="form-label">Energia(in Kw/h, nell'ultimo
                                        mese):</label>
                                    <input name="monthly_electric" type="text" class="form-control"
                                        id="monthlyElectricInput">
                                </div>

                                <div class="mb-3">
                                    <label for="monthlyGasInput" class="form-label">Gas(in mc, nell'ultimo
                                        mese):</label>
                                    <input name="monthly_gas" type="text" class="form-control" id="monthlyGasInput">
                                </div>

                                <div class="mb-3">
                                    <label for="monthlyOilInput" class="form-label">Carburante(in litri, nell'ultimo
                                        mese):</label>
                                    <input name="monthly_oil" type="text" class="form-control" id="monthlyOilInput">
                                </div>

                                <div class="mb-3">
                                    <label for="monthlyFlightsInput" class="form-label">Numero di voli(nell'ultimo
                                        mese):</label>
                                    <input name="monthly_flights" type="text" class="form-control" id="monthlyFlightsInput">
                                </div>

                                <div class="mb-3">
                                    <label for="monthlyKmInput" class="form-label">Chilometri totali in aereo(nell'ultimo
                                        mese):</label>
                                    <input name="monthly_km" type="text" class="form-control" id="monthlyKmInput">
                                </div>

                                <button class="btn">Invia</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
