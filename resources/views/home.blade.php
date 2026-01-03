@extends('layouts.app')

@section('title', $title)

@section('content')

<x-search-anime></x-search-anime>

<x-swiper-slide :result="$seasonNow" title="Now Playing" />

<div class="container">

    <x-contents-title title="See More.." />

    <div class="row justify-content-center">

        <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="rounded-5 shadow overflow-hidden">
                <img src="{{ asset('images/cover/top.webp') }}" class="w-100" style="height:12rem; object-fit:cover">

                <div class="p-3 text-center">
                    <h4 class="border-bottom border-3 pb-2">Top Anime</h4>
                    <p>Click button below to see the list of top Anime.</p>
                    <a href="/top" class="btn btn-dark">Click Here.</a>
                </div>
            </div>
        </div>

        <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="rounded-5 shadow overflow-hidden">
                <img src="{{ asset('images/cover/season.webp') }}" class="w-100" style="height:12rem; object-fit:cover">

                <div class="p-3 text-center">
                    <h4 class="border-bottom border-3 pb-2">Seasonal Anime</h4>
                    <p>Click button below to see the list of anime by seasons.</p>
                    <a href="/seasons" class="btn btn-dark">Click Here.</a>
                </div>
            </div>
        </div>

        <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="rounded-5 shadow overflow-hidden">
                <img src="{{ asset('images/cover/upcoming.webp') }}" class="w-100" style="height:12rem; object-fit:cover">

                <div class="p-3 text-center">
                    <h4 class="border-bottom border-3 pb-2">Top Upcoming</h4>
                    <p>Click button below to see the list of the Top Upcoming anime.</p>
                    <form action="/top" method="get">
                        <input type="hidden" name="filter" value="upcoming">

                        <button type="submit" class="btn btn-dark">Click Here.</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="rounded-5 shadow overflow-hidden">
                <img src="{{ asset('images/cover/about.webp') }}" class="w-100" style="height:12rem; object-fit:cover">

                <div class="p-3 text-center">
                    <h4 class="border-bottom border-3 pb-2">About Me.</h4>
                    <p>Click button below to get info about this website.</p>
                    <a href="/about" class="btn btn-dark">Click Here.</a>
                </div>
            </div>
        </div>

        @auth
        <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="rounded-5 shadow overflow-hidden">
                <img src="{{ asset('images/cover/favorites.webp') }}" class="w-100" style="height:12rem; object-fit:cover">
                <div class="p-3 text-center">
                    <h4 class="border-bottom border-3 pb-2">Favorites</h4>
                    <p>Hey {{ auth()->user()->name }}, Click button below to see the list of Favorites.</p>
                    <a href="/favorites" class="btn btn-dark">Click Here.</a>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="rounded-5 shadow overflow-hidden">
                <img src="{{ asset('images/cover/wishlists.webp') }}" class="w-100" style="height:12rem; object-fit:cover">
                <div class="p-3 text-center">
                    <h4 class="border-bottom border-3 pb-2">Wishlists</h4>
                    <p>Hey {{ auth()->user()->name }}, Click button below to see the list of Wishlists.</p>
                    <a href="/wishlists" class="btn btn-dark">Click Here.</a>
                </div>
            </div>
        </div>
        @endauth
    </div>
</div>


@endsection