@extends('layouts.admin')

@section('content')
<div class="container p-5 rounded-5 shadow">

    <h3 class="border-bottom pb-2">Hello, <span class="text-capitalize text-primary">{{ Auth::user()->name }}</span></h3>

</div>
@endsection