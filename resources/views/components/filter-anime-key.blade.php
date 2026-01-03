@props(['url', 'query', 'key_filter'])

@php

$type_values = [ "TV" => "tv", "Movie" => "movie", "Ova" => "ova", "Special" => "special", "Ona" => "ona", "Music" => "music", "Cm" => "cm", "Pv" => "pv", "Tv Special" => "tv_special"];

@endphp

<div class="container d-flex justify-content-end content-wrap flex-wrap gap-1 my-3">
    @foreach ( $type_values as $key => $value)
    <form action="{{ $url }}" method="get">

        @if( $query->get('filter') != null )
        <input type="hidden" name="filter" value="{{ $query->get('filter') }}">
        @endif

        <input type="hidden" name="{{ $key_filter }}" value="{{ $value }}">
        <button type="submit" class="btn btn-dark py-0 px-2 text-capitalize">{{ $key }}</button>
    </form>
    @endforeach
</div>