@props(['url', 'query'])

<div class="container d-flex justify-content-end my-3">
    <form action="{{ $url }}" method="get" class="d-flex gap-2" style="width: 30rem;">

        <select name="type" class="form-select bg-white">
            <option value=''>Type</option>
            <option value="tv" {{ request()->query('type') == 'tv' ? "Selected" : "" }}>TV</option>
            <option value="movie" {{ request()->query('type') == 'movie' ? "Selected" : "" }}>Movie</option>
            <option value="ova" {{ request()->query('type') == 'ova' ? "Selected" : "" }}>Ova</option>
            <option value="special" {{ request()->query('type') == 'special' ? "Selected" : "" }}>Special</option>
            <option value="ona" {{ request()->query('type') == 'ona' ? "Selected" : "" }}>ONA</option>
            <option value="cm" {{ request()->query('type') == 'cm' ? "Selected" : "" }}>CM</option>
            <option value="pv" {{ request()->query('type') == 'pv' ? "Selected" : "" }}>PV</option>
            <option value="tv_special" {{ request()->query('type') == 'tv_special' ? "Selected" : "" }}>TV Special</option>
            <option value="music" {{ request()->query('type') == 'music' ? "Selected" : "" }}>Music</option>
        </select>

        <select name="order" class="form-select bg-white">
            <option value="">Order</option>
            <option value="score" {{ request()->query('order') == 'score' ? "Selected" : "" }}>Score</option>
            <option value="year" {{ request()->query('order') == 'year' ? "Selected" : "" }}>Year</option>
        </select>

        <select name="sort" class="form-select bg-white">
            <option value="">Sort</option>
            <option value="asc" {{ request()->query('sort') == 'asc' ? "Selected" : "" }}>Ascending</option>
            <option value="desc" {{ request()->query('sort') == 'desc' ? "Selected" : "" }}>Descending</option>
        </select>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

</div>