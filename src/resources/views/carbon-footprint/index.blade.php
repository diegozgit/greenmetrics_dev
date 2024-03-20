@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Calcolo Carbon Footprint:</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Inserisci le informazioni richieste per scoprire la quantità di diossido di carbonio prodotta:') }}
                        </div>

                        <form action="{{ route('estimate') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                        Un livello di carbon footprint accettabile è compreso tra 6.000 e 15.999, mentre tra 16.000 e 22.000 è
                                        considerato nella media. Meno di 6.000 è eccellente, mentre oltre 22.000 significa che dovresti
                                        iniziare a prendere provvedimenti per ridurre quel numero.
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        ERRORE!
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="monthlyElectricInput" class="form-label">Bolletta elettrica mensile:</label>
                                    <input name="monthly_electric" type="text" class="form-control"
                                        id="monthlyElectricInput">
                                </div>

                                <div class="mb-3">
                                    <label for="monthlyGasInput" class="form-label">Bolletta gas mensile:</label>
                                    <input name="monthly_gas" type="text" class="form-control" id="monthlyGasInput">
                                </div>

                                <div class="mb-3">
                                    <label for="monthlyOilInput" class="form-label">Costo benzina al mese:</label>
                                    <input name="monthly_oil" type="text" class="form-control" id="monthlyOilInput">
                                </div>

                                <div class="mb-3">
                                    <label for="totalMileageInput" class="form-label">Chilometri annuali in macchina:</label>
                                    <input name="total_mileage" type="text" class="form-control" id="totalMileageInput">
                                </div>

                                <div class="mb-3">
                                    <label for="flightsShortInput" class="form-label">Numero di voli (4 ore o meno):</label>
                                    <input name="flights_short" type="text" class="form-control" id="flightsShortInput">
                                </div>

                                <div class="mb-3">
                                    <label for="flightsLongInput" class="form-label">Numero di voli (4 ore o più):</label>
                                    <input name="flights_long" type="text" class="form-control" id="flightsLongInput">
                                </div>

                                <div class="mb-3">
                                    <label for="recycleNewspaperInput" class="form-label">Recicli il giornale?</label>
                                    <input name="recycle_newspaper" type="text" class="form-control"
                                        id="recycleNewspaperInput">
                                </div>

                                <div class="mb-3">
                                    <label for="recycleAluminumInput" class="form-label">Recicli alluminio e lattine?</label>
                                    <input name="recycle_aluminum" type="text" class="form-control"
                                        id="recycleAluminumInput">
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
