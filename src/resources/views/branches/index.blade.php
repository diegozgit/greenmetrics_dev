@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Registra una sede</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Inserisci le seguenti informazioni richieste:') }}</div>

                        <form action="{{ route('create-branch') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        Sede registrata con successo!
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        Errore.
                                    </div>
                                @endif
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="descrizione" value="{{ Auth::user()->ragioneSociale }}">
                                <div class="mb-3">
                                    <label for="indirizzoInput" class="form-label">Indirizzo: </label>
                                    <input type="text" name="indirizzo"
                                        class="form-control @error('indirizzo') is-invalid @enderror" id="indirizzoInput"
                                        value="{{ old('indirizzo') }}" placeholder="Indirizzo" autofocus>
                                    @if ($errors->has('indirizzo'))
                                        <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="civicoInput" class="form-label">Numero Civico: </label>
                                    <input type="text" name="civico"
                                        class="form-control @error('civico') is-invalid @enderror" id="civicoInput"
                                        value="{{ old('civico') }}" placeholder="Numero Civico" autofocus>
                                    @if ($errors->has('civico'))
                                        <span class="text-danger">{{ $errors->first('civico') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="CAPInput" class="form-label">CAP: </label>
                                    <input type="text" name="CAP" class="form-control @error('CAP') is-invalid @enderror"
                                        id="CAPInput" value="{{ old('CAP') }}" placeholder="CAP" required="required"
                                        autofocus>
                                    @if ($errors->has('CAP'))
                                        <span class="text-danger">{{ $errors->first('CAP') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="localitaInput" class="form-label">Località: </label>
                                    <input type="text" name="localita"
                                        class="form-control @error('localita') is-invalid @enderror" id="localitaInput"
                                        value="{{ old('localita') }}" placeholder="Località" required="required" autofocus>
                                    @if ($errors->has('localita'))
                                        <span class="text-danger">{{ $errors->first('localita') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="provinciaInput" class="form-label">Provincia: </label>
                                    <input type="text" name="provincia"
                                        class="form-control @error('provincia') is-invalid @enderror" id="provinciaInput"
                                        value="{{ old('provincia') }}" placeholder="Provincia" required="required" autofocus>
                                    @if ($errors->has('provincia'))
                                        <span class="text-danger">{{ $errors->first('provincia') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="nazioneInput" class="form-label">Nazione: </label>
                                    <input type="text" name="nazione"
                                        class="form-control @error('nazione') is-invalid @enderror" id="nazioneInput"
                                        value="{{ old('nazione') }}" placeholder="Nazione" required="required" autofocus>
                                    @if ($errors->has('nazione'))
                                        <span class="text-danger">{{ $errors->first('nazione') }}</span>
                                    @endif
                                </div>
                                <button class="btn btn-success" type="submit">Registra sede</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
