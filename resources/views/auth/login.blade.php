@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <form method="POST" action="{{ route('login') }}" class="bg-white rounded-5 shadow p-5" style="width:27rem;">
        @csrf
        <h1 class="mb-4 fw-bold text-center text-primary">LOGIN</h1>

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

        <div class="mb-4 d-flex justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember me') }}
                </label>
            </div>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot password ?') }}
            </a>
            @endif
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100 rounded-5">
                {{ __('Log in') }}
            </button>
            <p class="text-center mt-2">Don't have an account ? <a href="{{ route('register') }}">Register</a> here</p>
        </div>
    </form>
</div>

@endsection