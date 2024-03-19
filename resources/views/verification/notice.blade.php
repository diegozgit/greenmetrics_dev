@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Dashboard</h1>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                Un nuovo link è stato inviato al tuo indirizzo email.
            </div>
        @endif

        Prima di procedere, perfavore controlla la tua casella di posta per trovare il link di verifica. Se non hai ricevuto
        nessuna email,
        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="d-inline btn btn-link p-0">
                clicca qua per ricevere un'altra.
            </button>
        </form>
    </div>
@endsection
