@extends('layouts.app')

@section('title', $title)

@section('content')

<x-search-anime></x-search-anime>

<div class="container text-secondary mb-3 text-center text-capitalize border-bottom">
    <h6>{{ $content_title }}</h6>
</div>

@if ( $source == "jikan" )
<div class="container">
    <div class="row">
        @foreach( $result as $item)
        <div class="col col-sm-6 col-md-4 col-lg-3 custom-btn-cover text-center mb-4">
            <div>
                <p class="mb-1">{{ strlen($item['entry']['title']) > 25 ? Str::limit($item['entry']['title'], 25) : $item['entry']['title'] }}</p>
                <a href="/detail/{{ $item['entry']['mal_id'] }}">
                    <img src="{{ $item['entry']['images']['webp']['image_url'] }}" class="shadow rounded-3" style="width:13rem; height:19rem; object-fit:cover">
                </a>
                @auth
                <div class="d-flex gap-2 justify-content-center mt-3 mb-2">
                    <livewire:wishlist-button :item="$item['entry']" :source=$source />
                </div>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
</div>
@elseif ( $source == "local" )
<div class="container">
    <div class="row">
        @foreach( $result as $item)
        <div class="col col-sm-6 col-md-4 col-lg-3 custom-btn-cover text-center mb-4 custom-btn-cover">
            <div>
                <p class="text-secondary mb-1">{{ strlen($item['title']) > 25 ? Str::limit($item['title'], 25) : $item['title'] }}</p>
                <a href="/detail/{{ $item['mal_id'] }}">
                    <img src="{{ $item['images']['webp']['image_url'] }}" class="mb-2 shadow rounded-3" style="width:13rem; height:19rem; object-fit:cover">
                </a>
                @auth
                <div class="d-flex gap-2 justify-content-center">
                    <livewire:wishlist-button :item="$item" :source=$source />
                </div>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection