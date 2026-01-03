@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card shadow rounded-5 overflow-hidden" style="width: 30rem;">
            <div class="card-header bg-dark text-white text-center">{{ __('Verify Your Email Address') }}</div>

            <div class="card-body px-4 text-center">
                @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif

                <div class="mb-3">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection