@extends('layouts.app')

@section('title', $title)

@section('content')

<x-search-anime></x-search-anime>

<x-filter-anime-key :url='$url' :key_filter='$key_filter' :query='$query' />

<div class="container">

    <div class="row">
        @foreach( collect($result)->sortBy('rank') as $item)
        <div class="col-12 col-xl-4 ">
            <div class="rounded-5 overflow-hidden shadow d-flex mb-3 position-relative">
                <img src="{{ $item['images']['webp']['image_url'] }}" style="width:9rem; height:14rem; object-fit:cover">

                <div class="w-100 p-2 overflow-auto" style="height:13rem;">
                    <h6 class="m-0 fw-bold">RANK #{{ $item['rank'] }}</h6>
                    <a href="/detail/{{ $item['mal_id'] }}" class="custom-a-link">
                        <p class="m-0 custom-a-link">{{ strlen($item['title']) > 50 ? Str::limit($item['title'], 50) : $item['title'] }}</p>
                    </a>

                    @foreach ( $item['genres'] as $genre )
                    <a href="{{ $genre['url'] }}" class="btn btn-dark py-0 px-1 my-1">{{ $genre['name'] }}</a>
                    @endforeach

                    <p class="m-0"><span class="fw-bold">{{ $item['type'] }} Score:</span> 🌟{{ $item['score'] }}</p>

                    <p>{{ Str::limit($item['synopsis'], 50) }}</p>

                    @auth
                    <div class="d-flex gap-1 position-absolute bottom-0 py-2">
                        <livewire:wishlist-button :item="$item" :source=$source />
                        <livewire:favorite-button :item="$item" :source=$source />
                    </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- <div class="col-2 col-md-2 col-xl-1 d-flex justify-content-center align-items-center">
            <div class="text-end">
                <span>{{ $item['mal_id'] }}</span>
                
                <span class="text-uppercase">{{ $item['season'] }} {{ $item['year'] }}</span class="text-uppercase">
            </div>
        </div> -->



        <!-- <div class="col-6 col-md-7 col-xl-9 py-3 position-relative">
            <div >

                



                <p class="m-0"><span class="fw-bold">Type: </span></p>
                
                
            </div>



        </div> -->
        @endforeach
    </div>



    <x-jikan-pagination :page="$page" :url="$url" :query='$query' />

</div>


@endsection