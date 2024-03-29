@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Cambio password</h1>
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cambia Password') }}</div>

                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    Password cambiata con successo!
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    Errore nel cambio password.
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Vecchia Password</label>
                                <input name="old_password" type="password"
                                    class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Vecchia Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Nuova Password</label>
                                <input name="new_password" type="password"
                                    class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="Nuova Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Conferma Nuova Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control"
                                    id="confirmNewPasswordInput" placeholder="Conferma Nuova Password">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Invia</button>
                            <a href="{{ route('dashboard.index') }}" class="btn btn-warning me-2">Dashboard</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
