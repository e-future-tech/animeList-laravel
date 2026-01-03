@props(['page', 'url', 'query'])

<div class="container d-flex justify-content-end gap-2 my-4">
    @if($page['current_page'] > 1 )
    <form action="{{ $url }}" method="get">
        @if(isset($query))
        @foreach( $query as $key => $value )
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        @endif

        <input type="hidden" name="page" value="{{ $page['current_page'] - 1 }}">
        <button type="submit" class="btn btn-dark">Prev</button>
    </form>
    @endif

    @if($page['has_next_page'] === true )
    <form action="{{ $url }}" method="get">

        @if(isset($query))
        @foreach( $query as $key => $value )
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        @endif

        <input type="hidden" name="page" value="{{ $page['current_page'] + 1 }}">
        <button type="submit" class="btn btn-dark">Next</button>
    </form>
    @endif
</div>