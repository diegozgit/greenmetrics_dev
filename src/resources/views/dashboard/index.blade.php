@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Dashboard</h1>
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informazioni user, cambia pure anche solo un dato alla volta:') }}</div>

                    <form action="{{ route('update-info') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    Dati cambiati con successo!
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    Errore, tutti i campi sono vuoti.
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="newNameInput" class="form-label">Nome: </label>
                                <input name="new_name" type="text"
                                    class="form-control @error('new_name') is-invalid @enderror" id="newNameInput"
                                    placeholder="{{ Auth::user()->nome }}">
                                @error('new_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newSurnameInput" class="form-label">Cognome: </label>
                                <input name="new_surname" type="text"
                                    class="form-control @error('new_surname') is-invalid @enderror" id="newSurnameInput"
                                    placeholder="{{ Auth::user()->cognome }}">
                                @error('new_surname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newRagioneSocialeInput" class="form-label">Ragione Sociale: </label>
                                <input name="new_ragioneSociale" type="text"
                                    class="form-control @error('new_ragioneSociale') is-invalid @enderror"
                                    id="newRagioneSocialeInput" placeholder="{{ Auth::user()->ragioneSociale }}">
                                @error('new_ragioneSociale')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPartitaIvaInput" class="form-label">Partita IVA: </label>
                                <input name="new_partitaIva" type="text"
                                    class="form-control @error('new_partitaIva') is-invalid @enderror"
                                    id="newPartitaIvaInput" placeholder={{ Auth::user()->partitaIva }}>
                                @error('new_partitaIva')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newCodFiscaleInput" class="form-label">Codice fiscale: </label>
                                <input name="new_codFiscale" type="text"
                                    class="form-control @error('new_codFiscale') is-invalid @enderror"
                                    id="newCodFiscaleInput" placeholder={{ Auth::user()->codFiscale }}>
                                @error('new_codFiscale')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newIndirizzoInput" class="form-label">Indirizzo: </label>
                                <input name="new_indirizzo" type="text"
                                    class="form-control @error('new_indirizzo') is-invalid @enderror" id="newIndirizzoInput"
                                    placeholder="{{ Auth::user()->indirizzo }}">
                                @error('new_indirizzo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newCivicoInput" class="form-label">Numero Civico: </label>
                                <input name="new_civico" type="text"
                                    class="form-control @error('new_civico') is-invalid @enderror" id="newCivicoInput"
                                    placeholder={{ Auth::user()->civico }}>
                                @error('new_civico')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newCapInput" class="form-label">CAP: </label>
                                <input name="new_CAP" type="text"
                                    class="form-control @error('new_CAP') is-invalid @enderror" id="newCapInput"
                                    placeholder={{ Auth::user()->CAP }}>
                                @error('new_CAP')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newComuneInput" class="form-label">Comune: </label>
                                <input name="new_comune" type="text"
                                    class="form-control @error('new_comune') is-invalid @enderror" id="newComuneInput"
                                    placeholder="{{ Auth::user()->comune }}">
                                @error('new_comune')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newProvinciaInput" class="form-label">Provincia: </label>
                                <input name="new_provincia" type="text"
                                    class="form-control @error('new_provincia') is-invalid @enderror" id="newProvinciaInput"
                                    placeholder="{{ Auth::user()->provincia }}">
                                @error('new_provincia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newNazioneInput" class="form-label">Nazione: </label>
                                <input name="new_nazione" type="text"
                                    class="form-control @error('new_nazione') is-invalid @enderror" id="newNazioneInput"
                                    placeholder="{{ Auth::user()->nazione }}">
                                @error('new_nazione')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newNumTelefonoInput" class="form-label">Numero di telefono: </label>
                                <input name="new_numTelefono" type="text"
                                    class="form-control @error('new_numTelefono') is-invalid @enderror"
                                    id="newNumTelefonoInput" placeholder={{ Auth::user()->numTelefono }}>
                                @error('new_numTelefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newEmailInput" class="form-label">Email: </label>
                                <input name="new_email" type="text"
                                    class="form-control @error('new_email') is-invalid @enderror" id="newEmailInput"
                                    placeholder={{ Auth::user()->email }}>
                                @error('new_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newUsernameInput" class="form-label">Username: </label>
                                <input name="new_username" type="text"
                                    class="form-control @error('new_username') is-invalid @enderror"
                                    id="newUsernameInput" placeholder={{ Auth::user()->username }}>
                                @error('new_username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn">Salva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <a href="/dashboard/change-password" class="btn btn-success">Cambia password</a>
        <a href="/dashboard/manage-branches" class="btn btn-success">Gestisci sedi</a>
    </div>
@endsection
