@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div style="width: 40rem;">
        <h2 class="mb-3 text-center border-bottom pb-3">{{ __('PROFILE') }}</h2>
        <div class="mb-4">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="mb-4">
            @include('profile.partials.update-password-form')
        </div>
        <div>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection