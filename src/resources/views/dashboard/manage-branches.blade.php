@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Le tue sedi o proprietà</h1>
            <div class="row justify-content-left">
                <div class="col-md-8">
                    <!-- Mostra qui l'elenco delle sedi o proprietà gestite dall'utente -->
                    @if (count($managedBranches) > 0)
                        <ul class="list-group">
                            @foreach ($managedBranches as $branch)
                                <li class="list-group-item">
                                    <strong>Indirizzo:</strong> {{ $branch->indirizzo }}
                                    <br>
                                    <strong>Civico:</strong> {{ $branch->civico }}
                                    <br>
                                    <strong>CAP:</strong> {{ $branch->CAP }}
                                    <br>
                                    <strong>Comune:</strong> {{ $branch->comune }}
                                    <br>
                                    <strong>Provincia:</strong> {{ $branch->provincia }}
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
                        <p>Nessuna sede o proprietà disponibile.</p>
                    @endif
                </div>
            </div>
        @endauth
    </div>
@endsection
