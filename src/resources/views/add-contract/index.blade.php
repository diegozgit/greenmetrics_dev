@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Inserisci contratto in vigore</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <form action="{{ route('add-contract') }}" method="POST">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        Registrazione a contratto avvenuta con successo!
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        Errore.
                                    </div>
                                @endif
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <div class="mb-3">
                                    <label for="nomeOfferta" class="form-label">Nome offerta: </label>
                                    <input type="text" name="nomeOfferta"
                                        class="form-control @error('nomeOfferta') is-invalid @enderror" id="nomeOfferta"
                                        value="{{ old('nomeOfferta') }}" required autofocus>
                                    @error('nomeOfferta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="utility" class="form-label">Tipo Contratto: </label>
                                    <select name="utility" id="utility"
                                        class="form-control @error('utility') is-invalid @enderror" required>
                                        <option value="GAS" {{ old('utility') == 'GAS' ? 'selected' : '' }}>GAS
                                        </option>
                                        <option value="LUCE" {{ old('utility') == 'LUCE' ? 'selected' : '' }}>
                                            LUCE</option>
                                        <option value="GAS/LUCE" {{ old('utility') == 'GAS/LUCE' ? 'selected' : '' }}>
                                            GAS/LUCE
                                        </option>
                                    </select>
                                    @error('utility')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="prezzoGas" class="form-label">Prezzo Gas: </label>
                                    <input type="number" step="0.01" name="prezzoGas" id="prezzoGas"
                                        class="form-control @error('prezzoGas') is-invalid @enderror"
                                        value="{{ old('prezzoGas') }}" autofocus>
                                    @error('prezzoGas')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="prezzoLuce" class="form-label">Prezzo Luce: </label>
                                    <input type="number" step="0.01" name="prezzoLuce" id="prezzoLuce"
                                        class="form-control @error('prezzoLuce') is-invalid @enderror"
                                        value="{{ old('prezzoLuce') }}" autofocus>
                                    @error('prezzoLuce')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="quotaFissa" class="form-label">Quota fissa: </label>
                                    <input type="number" step="0.01" name="quotaFissa" id="quotaFissa"
                                        class="form-control @error('quotaFissa') is-invalid @enderror"
                                        value="{{ old('quotaFissa') }}" required autofocus>
                                    @error('quotaFissa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button class="btn btn-success" type="submit">Inserisci contratto.</button>
                            </div>
                    </form>

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
