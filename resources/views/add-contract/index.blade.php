@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Inserisci contratto in vigore</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <h3>Sedi disponibili:</h3>
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

                                <div class="mb-3">
                                    <label for="idSede" class="form-label">Scegli la sede: </label>
                                    <select name="idSede" id='idSede'
                                        class="form-control @error('idSede') is-invalid @enderror" required>
                                        @foreach ($branchIds as $branchId)
                                            @php
                                                $sede = App\Models\Branch::find($branchId);
                                            @endphp
                                            <option value="{{ $sede->idSede }}">
                                                {{ $sede->descrizione . ', ' . $sede->indirizzo . ' ' . $sede->civico . ', ' . $sede->provincia . ' ' . $sede->nazione }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('idSede')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="dataRichiestaServizio" class="form-label">Data richiesta servizi: </label>
                                    <input type="datetime-local" name="dataRichiestaServizio"
                                        class="form-control @error('dataRichiestaServizio') is-invalid @enderror"
                                        id="dataRichiestaServizio" value="{{ old('dataRichiestaServizio') }}" required
                                        autofocus>
                                    @error('dataRichiestaServizio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="dataInizioValidita" class="form-label">Data inizio validità: </label>
                                    <input type="datetime-local" name="dataInizioValidita"
                                        class="form-control @error('dataInizioValidita') is-invalid @enderror"
                                        id="dataInizioValidita" value="{{ old('dataInizioValidita') }}" required autofocus>
                                    @error('dataInizioValidita')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="dataFineValidita" class="form-label">Data Fine Validita: </label>
                                    <input type="datetime-local" name="dataFineValidita"
                                        class="form-control @error('dataFineValidita') is-invalid @enderror"
                                        id="dataFineValidita" value="{{ old('dataFineValidita') }}" required autofocus>
                                    @error('dataFineValidita')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="descrizioneOfferta" class="form-label">Descrizione Offerta: </label>
                                    <select name="descrizioneOfferta" id="descrizioneOfferta"
                                        class="form-control @error('descrizioneOfferta') is-invalid @enderror" required>
                                        <option value="Easy Energy"
                                            {{ old('descrizioneOfferta') == 'Easy Energy' ? 'selected' : '' }}>Easy Energy
                                        </option>
                                        <option value="Family" {{ old('descrizioneOfferta') == 'Family' ? 'selected' : '' }}>
                                            Family</option>
                                        <option value="Full Power"
                                            {{ old('descrizioneOfferta') == 'Full Power' ? 'selected' : '' }}>Full Power
                                        </option>
                                        <option value="Super Power"
                                            {{ old('descrizioneOfferta') == 'Super Power' ? 'selected' : '' }}>Super Power
                                        </option>
                                    </select>
                                    @error('descrizioneOfferta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="utility" class="form-label">Utility: </label>
                                    <select name="utility" id="utility"
                                        class="form-control @error('utility') is-invalid @enderror" required>
                                        <option value="EE" {{ old('utility') == 'EE' ? 'selected' : '' }}>EE</option>
                                        <option value="EE/GAS" {{ old('utility') == 'EE/GAS' ? 'selected' : '' }}>EE/GAS
                                        </option>
                                        <option value="GAS" {{ old('utility') == 'GAS' ? 'selected' : '' }}>GAS</option>
                                    </select>
                                    @error('utility')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="statoContratto" class="form-label">Stato Contratto: </label>
                                    <select name="statoContratto" id="statoContratto"
                                        class="form-control @error('statoContratto') is-invalid @enderror" required>
                                        <option value="Attivo" {{ old('statoContratto') == 'Attivo' ? 'selected' : '' }}>
                                            Attivo</option>
                                        <option value="In lavorazione"
                                            {{ old('statoContratto') == 'In lavorazione' ? 'selected' : '' }}>In
                                            lavorazione</option>
                                    </select>
                                    @error('statoContratto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tipoPagamento" class="form-label">Tipo Pagamento: </label>
                                    <select name="tipoPagamento" id="tipoPagamento"
                                        class="form-control @error('tipoPagamento') is-invalid @enderror" required>
                                        <option value="Bonifico" {{ old('tipoPagamento') == 'Bonifico' ? 'selected' : '' }}>
                                            Bonifico</option>
                                        <option value="Carta di credito"
                                            {{ old('tipoPagamento') == 'Carta di credito' ? 'selected' : '' }}>Carta di
                                            credito</option>
                                        <option value="Bollettino"
                                            {{ old('tipoPagamento') == 'Bollettino' ? 'selected' : '' }}>Bollettino
                                        </option>
                                    </select>
                                    @error('tipoPagamento')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="potenzaImp" class="form-label">Potenza Imp: </label>
                                    <input type="number" step="0.01" name="potenzaImp" id="potenzaImp"
                                        class="form-control @error('potenzaImp') is-invalid @enderror"
                                        value="{{ old('potenzaImp') }}" required autofocus>
                                    @error('potenzaImp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="potDisp" class="form-label">Pot Disp: </label>
                                    <input type="number" step="0.01" name="potDisp" id="potDisp"
                                        class="form-control @error('potDisp') is-invalid @enderror"
                                        value="{{ old('potDisp') }}" required autofocus>
                                    @error('potDisp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="energiaAnno" class="form-label">Energia Anno: </label>
                                    <input type="number" name="energiaAnno" id="energiaAnno"
                                        class="form-control @error('energiaAnno') is-invalid @enderror"
                                        value="{{ old('energiaAnno') }}">
                                    @error('energiaAnno')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gasAnno" class="form-label">Gas Anno: </label>
                                    <input type="number" name="gasAnno" id="gasAnno"
                                        class="form-control @error('gasAnno') is-invalid @enderror"
                                        value="{{ old('gasAnno') }}">
                                    @error('gasAnno')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="usoCotturaCibi" class="form-label">Uso Cottura Cibi: </label>
                                    <select name="usoCotturaCibi" id="usoCotturaCibi"
                                        class="form-control @error('usoCotturaCibi') is-invalid @enderror" required>
                                        <option value="1" {{ old('usoCotturaCibi') == '1' ? 'selected' : '' }}>Sì
                                        </option>
                                        <option value="0" {{ old('usoCotturaCibi') == '0' ? 'selected' : '' }}>No
                                        </option>
                                        <option value="" {{ old('usoCotturaCibi') == '' ? 'selected' : '' }}>Non
                                            specificato</option>
                                    </select>
                                    @error('usoCotturaCibi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="produzioneAcquaCaldaSanitaria" class="form-label">Produzione Acqua Calda
                                        Sanitaria: </label>
                                    <select name="produzioneAcquaCaldaSanitaria" id="produzioneAcquaCaldaSanitaria"
                                        class="form-control @error('produzioneAcquaCaldaSanitaria') is-invalid @enderror"
                                        required>
                                        <option value="1"
                                            {{ old('produzioneAcquaCaldaSanitaria') == '1' ? 'selected' : '' }}>Sì</option>
                                        <option value="0"
                                            {{ old('produzioneAcquaCaldaSanitaria') == '0' ? 'selected' : '' }}>No</option>
                                        <option value=""
                                            {{ old('produzioneAcquaCaldaSanitaria') == '' ? 'selected' : '' }}>Non specificato
                                        </option>
                                    </select>
                                    @error('produzioneAcquaCaldaSanitaria')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="riscaldamentoIndividuale" class="form-label">Riscaldamento Individuale:
                                    </label>
                                    <select name="riscaldamentoIndividuale" id="riscaldamentoIndividuale"
                                        class="form-control @error('riscaldamentoIndividuale') is-invalid @enderror" required>
                                        <option value="1" {{ old('riscaldamentoIndividuale') == '1' ? 'selected' : '' }}>
                                            Sì</option>
                                        <option value="0" {{ old('riscaldamentoIndividuale') == '0' ? 'selected' : '' }}>
                                            No</option>
                                        <option value="" {{ old('riscaldamentoIndividuale') == '' ? 'selected' : '' }}>
                                            Non specificato</option>
                                    </select>
                                    @error('riscaldamentoIndividuale')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="usoCommerciale" class="form-label">Uso Commerciale: </label>
                                    <select name="usoCommerciale" id="usoCommerciale"
                                        class="form-control @error('usoCommerciale') is-invalid @enderror" required>
                                        <option value="1" {{ old('usoCommerciale') == '1' ? 'selected' : '' }}>Sì
                                        </option>
                                        <option value="0" {{ old('usoCommerciale') == '0' ? 'selected' : '' }}>No
                                        </option>
                                        <option value="" {{ old('usoCommerciale') == '' ? 'selected' : '' }}>Non
                                            specificato</option>
                                    </select>
                                    @error('usoCommerciale')
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
