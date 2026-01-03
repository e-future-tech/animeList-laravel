@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card rounded-5 overflow-hidden" style="width: 30rem;">

            <div class="card-header bg-dark text-white text-center">{{ __('Reset Password') }}</div>

            <div class="card-body bg-white px-5 py-3">
                <div class="mb-3 text-center">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center my-3">
                        <button type="submit" class="btn btn-dark">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection