@extends('layouts.app')

@section('title', $title)

@section('content')

<x-search-anime></x-search-anime>

<x-contents-title :title='$content_title' />


@if( $filter == "mini" )
<x-filter-anime-key :url='$url' :key_filter='$key_filter' :query='$query' />
@elseif ($filter == "local")
<x-filter-anime-local :url='$url' :query='$query' />
@else
<x-filter-anime :query='$query' :url='$url' />
@endif


<div class="container">
    <div class="row">
        @foreach( $result as $item)
        <x-contents-main :item="$item" :source="$source" />
        @endforeach
    </div>
</div>

@if ( $source == "jikan")
<x-jikan-pagination :page='$page' :url='$url' :query='$query' />
@elseif ( $source == 'local' )
<div class="container my-3">
    {{ $page->links() }}
</div>
@endif

@endsection