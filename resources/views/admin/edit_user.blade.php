@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-center">

    <form action="{{ route('force.update.user') }}" class="border shadow p-5 rounded-5" style="width: 30rem;" method="post">
        @csrf

        <input type="text" class="form-control text-white bg-secondary" name="password" value="{{ $result->password }}" hidden>

        <div class="mb-3">
            <label class="form-label">User ID</label>
            <input type="text" class="form-control text-white bg-secondary" name="user_id" value="{{ $result->user_id }}">
        </div>

        <div class="mb-3">
            <label class="form-label">User Name</label>
            <input type="text" class="form-control" value="{{ $result->name }}" name="name">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="Email" class="form-control" value="{{ $result->email }}" name="email">
        </div>

        <div class="mb-3">
            <label class="form-label">Email verified At</label>
            <input type="Email" class="form-control text-white bg-secondary" value="{{ $result->email_verified_at ? $result->email_verified_at : 'NULL' }}" name="email" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Created At</label>
            <input type="Email" class="form-control text-white bg-secondary" value="{{ $result->created_at }}" name="email" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Updated At</label>
            <input type="Email" class="form-control text-white bg-secondary" value="{{ $result->updated_at }}" name="email" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password">
        </div>

        <button type="submit" class="btn btn-outline-primary w-100 mt-3 rounded-5">Update</button>

        @session("Success")
        <div class="alert alert-success rounded-5 p-1 text-center">{{ session("Success") }}</div>
        @endsession
        @session("Failed")
        <div class="alert alert-danger rounded-5 p-1 text-center">{{ session("Failed") }}</div>
        @endsession

    </form>
</div>
@endsection