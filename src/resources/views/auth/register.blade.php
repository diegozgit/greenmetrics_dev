@extends('layouts.auth-master')

@section('content')
    <div class="bg-light p-5 rounded text-center">
        <script>
            function togglePassword(inputId, buttonId) {
                var passwordInput = document.getElementById(inputId);
                var toggleButton = document.getElementById(buttonId);

                toggleButton.addEventListener('mousedown', function() {
                    passwordInput.type = 'text';
                });

                toggleButton.addEventListener('mouseup', function() {
                    passwordInput.type = 'password';
                });

                // Reset to password type if the mouse leaves the button
                toggleButton.addEventListener('mouseleave', function() {
                    passwordInput.type = 'password';
                });
            }
        </script>
        <h1>Registrati</h1>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <form method="post" action="{{ route('register.perform') }}" class="col-md-6 mb-3">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Inserisci qua i tuoi dati personali(Segnati con * sono i dati da inserire
                            obbligatoriamente):</h6>
                        @include('layouts.partials.messages')

                        <div class="mb-3">
                            <label for="nomeInput" class="form-label">Nome: </label>
                            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                                id="nomeInput" value="{{ old('nome') }}" placeholder="Nome" autofocus>
                            @if ($errors->has('nome'))
                                <span class="text-danger">{{ $errors->first('nome') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="cognomeInput" class="form-label">Cognome: </label>
                            <input type="text" name="cognome" class="form-control @error('cognome') is-invalid @enderror"
                                id="cognomeInput" value="{{ old('cognome') }}" placeholder="Cognome" autofocus>
                            @if ($errors->has('cognome'))
                                <span class="text-danger">{{ $errors->first('cognome') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="ragioneSocialeInput" class="form-label">Ragione Sociale*: </label>
                            <input type="text" name="ragioneSociale"
                                class="form-control @error('ragioneSociale') is-invalid @enderror" id="ragioneSociale"
                                value="{{ old('ragioneSociale') }}" placeholder="Ragione Sociale" required="required"
                                autofocus>
                            @if ($errors->has('ragioneSociale'))
                                <span class="text-danger">{{ $errors->first('ragioneSociale') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="partitaIvaInput" class="form-label">Partita IVA: </label>
                            <input type="text" name="partitaIva"
                                class="form-control @error('partitaIva') is-invalid @enderror" id="partitaIvaInput"
                                value="{{ old('partitaIva') }}" placeholder="Partita IVA" autofocus>
                            @if ($errors->has('partitaIva'))
                                <span class="text-danger">{{ $errors->first('partitaIva') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="codFiscaleInput" class="form-label">Codice Fiscale: </label>
                            <input type="text" name="codFiscale"
                                class="form-control @error('codFiscale') is-invalid @enderror" id="codFiscaleInput"
                                value="{{ old('codFiscale') }}" placeholder="Codice fiscale" autofocus>
                            @if ($errors->has('codFiscale'))
                                <span class="text-danger">{{ $errors->first('codFiscale') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="indirizzoInput" class="form-label">Indirizzo*: </label>
                            <input type="text" name="indirizzo"
                                class="form-control @error('indirizzo') is-invalid @enderror" id="indirizzoInput"
                                value="{{ old('indirizzo') }}" placeholder="Indirizzo" required="required" autofocus>
                            @if ($errors->has('indirizzo'))
                                <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="civicoInput" class="form-label">Numero Civico*: </label>
                            <input type="text" name="civico" class="form-control @error('civico') is-invalid @enderror"
                                id="civicoInput" value="{{ old('civico') }}" placeholder="Numero civico"
                                required="required" autofocus>
                            @if ($errors->has('civico'))
                                <span class="text-danger">{{ $errors->first('civico') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="capInput" class="form-label">CAP*: </label>
                            <input type="text" name="CAP" class="form-control @error('CAP') is-invalid @enderror"
                                id="capInput" value="{{ old('CAP') }}" placeholder="CAP" required="required" autofocus>
                            @if ($errors->has('CAP'))
                                <span class="text-danger">{{ $errors->first('CAP') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="comuneInput" class="form-label">Comune*: </label>
                            <input type="text" name="comune" class="form-control @error('comune') is-invalid @enderror"
                                id="comuneInput" value="{{ old('comune') }}" placeholder="Comune" required="required"
                                autofocus>
                            @if ($errors->has('comune'))
                                <span class="text-danger">{{ $errors->first('comune') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="provinciaInput" class="form-label">Provincia*: </label>
                            <input type="text" name="provincia"
                                class="form-control @error('provincia') is-invalid @enderror" id="provinciaInput"
                                value="{{ old('provincia') }}" placeholder="Provincia" required="required" autofocus>
                            @if ($errors->has('provincia'))
                                <span class="text-danger">{{ $errors->first('provincia') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="nazioneInput" class="form-label">Nazione*: </label>
                            <input type="text" name="nazione"
                                class="form-control @error('nazione') is-invalid @enderror" id="nazioneInput"
                                value="{{ old('nazione') }}" placeholder="Nazione" required="required" autofocus>
                            @if ($errors->has('nazione'))
                                <span class="text-danger">{{ $errors->first('nazione') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="numTelefonoInput" class="form-label">Numero di telefono: </label>
                            <input type="text" name="numTelefono"
                                class="form-control @error('numTelefono') is-invalid @enderror" id="numTelefonoInput"
                                value="{{ old('numTelefono') }}" placeholder="Numero di telefono" autofocus>
                            @if ($errors->has('numTelefono'))
                                <span class="text-danger">{{ $errors->first('numTelefono') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Indirizzo Email*: </label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="emailInput"
                                value="{{ old('email') }}" placeholder="nome@gmail.com" required="required" autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username*: </label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="usernameInput"
                                value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password*:</label>
                            <div class="input-group">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="passwordInput"
                                    value="{{ old('password') }}" placeholder="Password" required="required">
                                <button class="btn btn-outline-secondary" type="button"
                                    onmousedown="togglePassword('passwordInput', 'togglePasswordBtn')"
                                    onmouseup="togglePassword('passwordInput', 'togglePasswordBtn')"
                                    onmouseleave="togglePassword('passwordInput', 'togglePasswordBtn')"
                                    id="togglePasswordBtn">
                                    <i class="bi bi-eye"></i> Mostra Password
                                </button>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="confirmPasswordInput" class="form-label">Conferma Password*:</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="confirmPasswordInput" value="{{ old('password_confirmation') }}"
                                    placeholder="Conferma Password" required="required">
                                <button class="btn btn-outline-secondary" type="button"
                                    onmousedown="togglePassword('confirmPasswordInput', 'toggleConfirmPasswordBtn')"
                                    onmouseup="togglePassword('confirmPasswordInput', 'toggleConfirmPasswordBtn')"
                                    onmouseleave="togglePassword('confirmPasswordInput', 'toggleConfirmPasswordBtn')"
                                    id="toggleConfirmPasswordBtn">
                                    <i class="bi bi-eye"></i> Mostra Password
                                </button>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">Registrati</button>
                        <a href="{{ route('home.index') }}" class="btn btn-danger me-2">Home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
