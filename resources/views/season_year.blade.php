@extends('layouts.app')

@section('title', $title)

@section('content')

<x-search-anime></x-search-anime>

<div class="container text-secondary mb-3 border-bottom">
    <h6 class="text-center">{{ $content_title }}</h6>
</div>

<div class="d-flex justify-content-center">
    <div class="rounded-3 border py-3 px-2">
        @foreach($result as $item)
        <div class="d-flex justify-content-center gap-2 mb-3">
            @foreach($item['seasons'] as $season)
            <a href="/seasons/{{ $item['year'] }}/{{ $season }}" class="btn btn-outline-dark text-capitalize"> {{ $season . ' '. $item['year']  }} </a>
            @endforeach
        </div>
        @endforeach
    </div>
</div>

@endsection