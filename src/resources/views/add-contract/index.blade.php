@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Contratti</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    @if (count($offers) > 0)
                        <ul class="list-group">
                            @foreach ($offers as $offer)
                                <li class="list-group-item">
                                    <strong>Nome Offerta:</strong> {{ $offer->nomeOfferta }}
                                    <br>
                                    <strong>Tipo Contratto:</strong> {{ $offer->utility }}
                                    <br>
                                    <strong>Prezzo Gas:</strong> {{ $offer->prezzoGas }}
                                    <br>
                                    <strong>Prezzo Luce:</strong> {{ $offer->prezzoLuce }}
                                    <br>
                                    <strong>Quota Fissa:</strong> {{ $offer->quotaFissa }}
                                    <form action="{{ route('add-contract') }}" method="POST">
                                        @csrf
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                Registrazione a contratto avvenuta con successo!
                                            </div>
                                        @elseif (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <strong><label for="idSede" class="form-label">Proprietà/Sede: </label></strong>
                                            <select name="idSede" id="idSede"
                                                class="form-control @error('idSede') is-invalid @enderror" required>
                                                @foreach ($userBranches as $branch)
                                                    <option value="{{ $branch->idSede }}"
                                                        {{ old('idSede') == $branch->idSede ? 'selected' : '' }}>
                                                        {{ $branch->indirizzo }} {{ $branch->civico }},
                                                        {{ $branch->comune }},
                                                        {{ $branch->CAP }}, {{ $branch->provincia }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('idSede')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label for="codPodInput" class="form-label">Codice POD: </label>
                                            <input type="text" name="codPod"
                                                class="form-control @error('codPod') is-invalid @enderror" id="codPodInput"
                                                value="{{ old('codPod') }}" placeholder="Codice POD" autofocus>
                                            @if ($errors->has('codPod'))
                                                <span class="text-danger">{{ $errors->first('codPod') }}</span>
                                            @endif
                                        </div>
                                        <input type="hidden" name="idOfferta" value="{{ $offer->idOfferta }}">
                                        <input type="hidden" name="nomeOfferta" value="{{ $offer->nomeOfferta }}">
                                        <input type="hidden" name="utility" value="{{ $offer->utility }}">
                                        <input type="hidden" name="prezzoGas" value="{{ $offer->prezzoGas }}">
                                        <input type="hidden" name="prezzoLuce" value="{{ $offer->prezzoLuce }}">
                                        <input type="hidden" name="quotaFissa" value="{{ $offer->quotaFissa }}">
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="dataInizioValidita"
                                            value="{{ Carbon\Carbon::now()->setTimezone('Europe/Rome') }}">
                                        <button class="btn btn-success" type="submit">Inserisci contratto</button>
                                    </form>
                                </li>
                                <br>
                            @endforeach
                        </ul>
                    @else
                        <p>Nessuna offerta disponibile.</p>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Errore durante la creazione del contratto:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endauth
    </div>
@endsection
