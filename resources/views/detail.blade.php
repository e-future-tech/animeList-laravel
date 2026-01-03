@extends('layouts.app')

@section('title', $title)

@section('content')

<x-search-anime></x-search-anime>

<div class="container">

    <div class="p-3 border rounded-3 mb-2 text-center">
        <h3 class="m-0 ">{{ $result['title'] }}</h3>
        <p class="m-0">{{ $result['title_english'] }}</p>
    </div>

    <div class="d-flex gap-2 justify-content-end rounded-3 border p-2 mb-3">
        <span><span class="fw-bold">Mal Id: </span>{{ $result['mal_id'] }}</span>
        |<span><span class="fw-bold">Score: </span>⭐{{ $result['score'] }}</span>
        |<span><span class="fw-bold">Score by: </span>{{ $result['scored_by'] }}</span>
        |<span><span class="fw-bold">Rank: #</span>{{ $result['rank'] }}</span>
        @if ( $result['season'] != null )
        |<span><span class="fw-bold">Season: </span>{{ $result['season'] . " ". $result['year'] }}</span>
        @endif
    </div>

    <div class="row">
        <div class="col-12 col-md-5 col-xl-3 mb-4">
            <img src="{{ $result['images']['webp']['large_image_url'] }}" class="rounded-5 w-100 shadow" style="height: 30rem; object-fit:cover">
        </div>

        <div class="col-12 col-md-7 col-xl-9 mb-4">
            <div class="ratio ratio-16x9 rounded-5 overflow-hidden w-100 shadow" style="height: 30rem;">
                <iframe src="{{ $result['trailer']['embed_url'] }}" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end my-3">
        @auth
        <div class="d-flex gap-1">
            <livewire:wishlist-button :item="$result" :source=$source />
            <livewire:favorite-button :item="$result" :source=$source />
        </div>
        @endauth
        <a href="/recommendations/{{ $result['mal_id'] }}/{{ $result['title'] }}" class="btn btn-dark py-0 px-2 ms-1">Recommendations</a>
    </div>

    <div class="row row-cols-1 row-cols-md-1 row-cols-xl-2 mb-3">
        <div class="col mb-4">
            <div class="rounded-5 shadow p-5">
                <p class="m-0"><span class="fw-bold">Type: </span>{{ $result['type'] }}</p>
                <p class="m-0"><span class="fw-bold">Episode:</span>{{ $result['episodes'] }}</p>
                <p class="m-0"><span class="fw-bold">Duration: </span>{{ $result['duration'] }}</p>
                <p class="m-0"><span class="fw-bold">Status: </span>{{ $result['status'] }}</p>
                <p class="m-0"><span class="fw-bold">Aired: </span>{{ $result['aired']['string'] }}</p>
                <p class="mb-1"><span class="fw-bold">Source: </span>{{ $result['source'] }}</p>

                <p class="m-0">
                    <span class="fw-bold">Genre: </span>
                    @foreach ( $result['genres'] as $genre )
                    <a href="{{ $genre['url'] }}" class="btn btn-dark py-0 px-2 mb-2">{{ $genre['name'] }}</a>
                    @endforeach
                </p>

                <p class="m-0">
                    <span class="fw-bold">Themes: </span>
                    @foreach ( $result['themes'] as $theme )
                    <a href="{{ $theme['url'] }}" class="btn btn-dark py-0 px-2 mb-2">{{ $theme['name'] }}</a>
                    @endforeach
                </p>

                <p class="m-0">
                    <span class="fw-bold">Producer: </span>
                    @foreach ( $result['producers'] as $producer )
                    <a href="{{ $producer['url'] }}" class="btn btn-secondary py-0 px-2 mb-2">{{ $producer['name'] }}</a>
                    @endforeach
                </p>

                <p class="m-0">
                    <span class="fw-bold">Studio: </span>
                    @foreach ( $result['studios'] as $studio )
                    <a href="{{ $studio['url'] }}" class="btn btn-secondary py-0 px-2 mb-2">{{ $studio['name'] }}</a>
                    @endforeach
                </p>
            </div>
        </div>
        <div class="col mb-3">
            <div class="rounded-5 shadow p-5">
                <h5 class="border-bottom mb-2">Related Entries</h5>
                @foreach ( $result['relations'] as $relation )

                @if($relation['entry'][0]['type'] == 'anime' )
                <p class="m-0">
                    <span class="fw-bold">{{ $relation["relation"] }}: </span>
                    <a href="/detail/{{ $relation['entry'][0]['mal_id'] }}" class="custom-a-link">{{ $relation['entry'][0]['name'] }}</a>
                </p>
                @endif

                @endforeach
            </div>
        </div>
    </div>

    <div class="p-5 rounded-5 shadow">
        <h5 class="border-bottom mb-2">Synopsis</h5>
        <p class="text-justify">{{ $result['synopsis'] }}</p>
    </div>


</div>


@endsection