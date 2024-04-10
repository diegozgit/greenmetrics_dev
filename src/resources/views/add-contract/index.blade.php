@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Contratti</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <li class="list-group-item">
                        <strong>Nome offerta:</strong>
                        <br>
                        <strong>Utility:</strong>
                        <br>
                        <strong>Prezzo GAS:</strong>
                        <br>
                        <strong>Prezzo LUCE:</strong>
                        <br>
                        <strong>Quota fissa:</strong>
                        <br>
                        <form action="{{ route('add-contract') }}" method="POST">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    Registrazione a contratto avvenuta con successo!
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    Errore.
                                </div>
                            @endif
                            <div class="mb-3">
                                <strong><label for="indirizzo" class="form-label">Proprietà/Sede: </label></strong>
                                <select name="indirizzo" id="indirizzo">
                                </select>
                                @error('indirizzo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="dataInizioValidita" value="{{ Carbon\Carbon::now() }}">
                            <button class="btn btn-success" type="submit">Inserisci contratto</button>
                        </form>
                    </li>

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
