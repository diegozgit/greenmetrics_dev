@extends('layouts.auth-master')

@section('content')
    <div class="bg-light p-5 rounded text-center">
        <h1>Login</h1>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <form method="post" action="{{ route('login.perform') }}" class="col-md-6 mb-3">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Inserisci qua i tuoi dati personali:</h6>
                        @include('layouts.partials.messages')

                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Email o Username: </label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="usernameInput"
                                value="{{ old('username') }}" placeholder="Email o Username" required="required" autofocus>
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password: </label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="passwordInput"
                                value="{{ old('password') }}" placeholder="Password" required="required">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">Login</button>
                        <a href="{{ route('home.index') }}" class="btn btn-danger me-2">Home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
