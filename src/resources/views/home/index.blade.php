@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth('web')
            <h1>Greenmetrics</h1>
            <p class="lead">Benvenuto, {{ Auth::user()->ragioneSociale }}!</p>
            <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-warning me-2">Vai alla Dashboard</a>
            <a href="{{ route('add-contract.index') }}" class="btn btn-lg btn-warning me-2">Aggiungi Contratti</a>
            <a href="{{ route('my-contracts.index') }}" class="btn btn-lg btn-warning me-2">I tuoi Contratti</a>
            <a href="{{ route('carbon-footprint.index') }}" class="btn btn-lg btn-warning me-2">Vai al calcolo del Carbon
                Footprint</a>
            <a href="{{ route('branches.index') }}" class="btn btn-lg btn-warning me-2">Registra una nuova sede o proprietà</a>
        @endauth

        @auth('admin')
            <h1>Greenmetrics Admin</h1>
            <p class="lead">Benvenuto, {{ Auth::guard('admin')->user()->username }}!</p>
            <a href="{{ route('registerSupplier.perform') }}" class="btn btn-lg btn-warning me-2">Registra un fornitore</a>
        @endauth

        @auth('supplier')
            <h1>Greenmetrics</h1>
            <p class="lead">Benvenuto, {{ Auth::guard('supplier')->user()->ragioneSociale }}!</p>
            <a href="{{ route('add-offer.index') }}" class="btn btn-lg btn-warning me-2">Crea offerta</a>
        @endauth

        @if (!Auth::guard('web')->check() && !Auth::guard('admin')->check() && !Auth::guard('supplier')->check())
            @guest
                <h1>Homepage</h1>
                <p class="lead">Benvenuto! Effettua il login per vedere le informazioni riservate agli utenti registrati.</p>
            @endguest
        @endif
    </div>
@endsection
