@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Greenmetrics</h1>
            <p class="lead">Benvenuto, {{ Auth::user()->ragioneSociale }}!</p>
            <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-warning me-2">Vai alla Dashboard</a>
            <a href="{{ route('add-contract.index') }}" class="btn btn-lg btn-warning me-2">Aggiungi Contratti</a>
            <a href="{{ route('my-contracts.index') }}" class="btn btn-lg btn-warning me-2">I tuoi Contratti</a>
            <a href="{{ route('carbon-footprint.index') }}" class="btn btn-lg btn-warning me-2">Vai al calcolo del Carbon
                Footprint</a>
            <a href="{{ route('branches.index') }}" class="btn btn-lg btn-warning me-2">Registra una sede</a>
        @endauth

        @guest
            <h1>Homepage</h1>
            <p class="lead">Benvenuto! Effettua il login per vedere le informazioni riservate agli utenti registrati.</p>
        @endguest
    </div>
@endsection
