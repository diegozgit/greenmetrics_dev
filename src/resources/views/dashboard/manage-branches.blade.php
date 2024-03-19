@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Le tue sedi</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <!-- Mostra qui l'elenco delle sedi gestite dall'utente -->
                    @if (count($managedBranches) > 0)
                        <ul class="list-group">
                            @foreach ($managedBranches as $branch)
                                <li class="list-group-item">
                                    <strong>ID Sede:</strong> {{ $branch->idSede }}
                                    <br>
                                    <strong>Descrizione:</strong> {{ $branch->descrizione }}
                                    <br>
                                    <strong>Indirizzo:</strong> {{ $branch->indirizzo }}
                                    <br>
                                    <strong>Civico:</strong> {{ $branch->civico }}
                                    <br>
                                    <strong>CAP:</strong> {{ $branch->CAP }}
                                    <br>
                                    <strong>Località:</strong> {{ $branch->localita }}
                                    <br>
                                    <strong>Provincia:</strong> {{ $branch->provincia }}
                                    <br>
                                    <strong>Nazione:</strong> {{ $branch->nazione }}
                                    <br>
                                    <form action="{{ route('dashboard.manage-branches.delete') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="branch_id" value="{{ $branch->idSede }}">
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Nessuna sede disponibile.</p>
                    @endif
                </div>
            </div>
        @endauth
    </div>
@endsection
