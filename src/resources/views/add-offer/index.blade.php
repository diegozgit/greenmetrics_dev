@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth('supplier')
            <h1>Crea un'offerta</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Inserisci le seguenti informazioni richieste:') }}</div>

                        <form action="{{ route('add-offer') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        Offerta creata con successo!
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        Errore.
                                    </div>
                                @endif
                                <input type="hidden" name="idFornitore"
                                    value="{{ Auth::guard('supplier')->user()->idFornitore }}">
                                <div class="mb-3">
                                    <label for="nomeOffertaInput" class="form-label">Nome Offerta: </label>
                                    <input type="text" name="nomeOfferta"
                                        class="form-control @error('nomeOfferta') is-invalid @enderror" id="nomeOffertaInput"
                                        value="{{ old('nomeOfferta') }}" placeholder="Nome Offerta" required='required'
                                        autofocus>
                                    @if ($errors->has('nomeOfferta'))
                                        <span class="text-danger">{{ $errors->first('nomeOfferta') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="utilityInput" class="form-label">Utility: </label>
                                    <input type="text" name="utility"
                                        class="form-control @error('utility') is-invalid @enderror" id="utilityInput"
                                        value="{{ old('utility') }}" placeholder="GAS/LUCE" required='required' autofocus>
                                    @if ($errors->has('utility'))
                                        <span class="text-danger">{{ $errors->first('utility') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="prezzoGasInput" class="form-label">prezzoGas: </label>
                                    <input type="text" name="prezzoGas"
                                        class="form-control @error('prezzoGas') is-invalid @enderror" id="prezzoGasInput"
                                        value="{{ old('prezzoGas') }}" placeholder="prezzoGas" autofocus>
                                    @if ($errors->has('prezzoGas'))
                                        <span class="text-danger">{{ $errors->first('prezzoGas') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="prezzoLuceInput" class="form-label">prezzoLuce: </label>
                                    <input type="text" name="prezzoLuce"
                                        class="form-control @error('prezzoLuce') is-invalid @enderror" id="prezzoLuceInput"
                                        value="{{ old('prezzoLuce') }}" placeholder="prezzoLuce" required="required" autofocus>
                                    @if ($errors->has('prezzoLuce'))
                                        <span class="text-danger">{{ $errors->first('prezzoLuce') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="quotaFissaInput" class="form-label">quotaFissa: </label>
                                    <input type="text" name="quotaFissa"
                                        class="form-control @error('quotaFissa') is-invalid @enderror" id="quotaFissaInput"
                                        value="{{ old('quotaFissa') }}" placeholder="quotaFissa" required="required" autofocus>
                                    @if ($errors->has('quotaFissa'))
                                        <span class="text-danger">{{ $errors->first('quotaFissa') }}</span>
                                    @endif
                                </div>
                                <button class="btn btn-success" type="submit">Crea</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
