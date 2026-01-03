@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <form method="POST" action="{{ route('register') }}" class="bg-white rounded-5 shadow p-5" style="width:30rem;">
        @csrf
        <h1 class="mb-4 fw-bold text-center text-primary">REGISTER</h1>

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>

            <input id="name" type="text" class="form-control rounded-3" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="password-confirm" class="form-label text-md-end">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 rounded-5 mb-3">
                {{ __('Register') }}
            </button>
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</div>
@endsection