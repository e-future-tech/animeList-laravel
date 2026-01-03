@props(['query', 'url'])

<div class="container d-flex justify-content-end my-3">
    <form action="{{ $url }}" method="get" class="d-flex gap-2" style="width: 30rem;">

        <input type="hidden" name="q" value="{{ $query->get('q') }}">

        <select name="type" class="form-select text-capitalize bg-white">
            @if($query->get('type'))
            <option value="{{ $query->get('type') }}">{{ $query->get('type') }}</option>
            @endif
            <option value="">type</option>
            <option value="tv">tv</option>
            <option value="movie">movie</option>
            <option value="ova">ova</option>
            <option value="special">special</option>
            <option value="ona">ona</option>
            <option value="cm">cm</option>
            <option value="pv">pv</option>
            <option value="tv_special">tv_special</option>
            <option value="music">music</option>
        </select>
        <select name="order_by" class="form-select text-capitalize bg-white">
            @if($query->get('order_by'))
            <option value="{{ $query->get('order_by') }}">{{ $query->get('order_by') }}</option>
            @endif

            <option value="">Order By</option>
            <option value="title">title</option>
            <option value="score">score</option>
            <option value="rank">rank</option>
        </select>
        <select name="sort" class="form-select text-capitalize bg-white">
            @if($query->get('sort'))
            <option value="{{ $query->get('sort') }}">{{ $query->get('sort') }}</option>
            @endif

            <option value="">Sort</option>
            <option value="desc">desc</option>
            <option value="asc">asc</option>
        </select>

        <button type="submit" class="btn btn-dark">Filter</button>
    </form>

</div>