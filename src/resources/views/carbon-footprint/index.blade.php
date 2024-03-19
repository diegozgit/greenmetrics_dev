@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Calcolo Carbon Footprint (MOLTO DI BASE, IN INGLESE, DA CAMBIARE):</h1>
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
                                        A “good” carbon footprint is considered to be 6,000 to 15,999, while 16,000-22,000 is
                                        considered average. Lower than 6,000 is excellent, while over 22,000 means you should
                                        start taking steps to bring that number down.
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        ERRORE!
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="monthlyElectricInput" class="form-label">Monthly Electric Bill:</label>
                                    <input name="monthly_electric" type="text" class="form-control"
                                        id="monthlyElectricInput">
                                </div>

                                <div class="mb-3">
                                    <label for="monthlyGasInput" class="form-label">Monthly Gas Bill:</label>
                                    <input name="monthly_gas" type="text" class="form-control" id="monthlyGasInput">
                                </div>

                                <div class="mb-3">
                                    <label for="monthlyOilInput" class="form-label">Monthly Oil Bill:</label>
                                    <input name="monthly_oil" type="text" class="form-control" id="monthlyOilInput">
                                </div>

                                <div class="mb-3">
                                    <label for="totalMileageInput" class="form-label">Total Yearly Mileage on Your Car:</label>
                                    <input name="total_mileage" type="text" class="form-control" id="totalMileageInput">
                                </div>

                                <div class="mb-3">
                                    <label for="flightsShortInput" class="form-label">Number of Flights (4 hours or
                                        less):</label>
                                    <input name="flights_short" type="text" class="form-control" id="flightsShortInput">
                                </div>

                                <div class="mb-3">
                                    <label for="flightsLongInput" class="form-label">Number of Flights (4 hours or
                                        more):</label>
                                    <input name="flights_long" type="text" class="form-control" id="flightsLongInput">
                                </div>

                                <div class="mb-3">
                                    <label for="recycleNewspaperInput" class="form-label">Do you recycle newspaper?</label>
                                    <input name="recycle_newspaper" type="text" class="form-control"
                                        id="recycleNewspaperInput">
                                </div>

                                <div class="mb-3">
                                    <label for="recycleAluminumInput" class="form-label">Do you recycle aluminum and
                                        tin?</label>
                                    <input name="recycle_aluminum" type="text" class="form-control"
                                        id="recycleAluminumInput">
                                </div>
                                <button class="btn">Salva</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
