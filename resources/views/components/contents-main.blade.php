@props(['item', 'source'])

<div class="col col-12 col-lg-6 col-xl-4 mb-3">
    <div class="d-flex shadow rounded-5 overflow-hidden">

        <div style="width:14rem;">
            <img src="{{ $item['images']['webp']['image_url'] }}" class="w-100" style="height:16rem; object-fit:cover">
        </div>

        <div class="w-100 p-2 position-relative">
            <div class="overflow-auto" style="height:14rem;">
                <a href="/detail/{{ $item['mal_id'] }}" class="custom-a-link">
                    <p class="m-0 fw-bold">{{ strlen($item['title']) > 25 ? Str::limit($item['title'], 25) : $item['title'] }}</p>
                </a>
                <span>{{ $item['type']. '-'. $item['year']. ' ~ ⭐' . $item['score'] }}</span>

                <div class="my-2">
                    @foreach ( $item['genres'] as $genre )
                    <a href="{{ $genre['url'] }}" class="btn btn-dark py-0 px-1 mb-1">{{ $genre['name'] }}</a>
                    @endforeach
                </div>
                <p class="m-0"><span class="fw-bold">Status: </span>{{ $item['status'] }}</p>
                <p>{{ Str::limit($item['synopsis'], 50) }}</p>
            </div>

            @auth
            <div class="d-flex gap-1 position-absolute bottom-0 start-0 p-2">
                <livewire:wishlist-button :item="$item" :source=$source />
                <livewire:favorite-button :item="$item" :source=$source />
            </div>
            @endauth
        </div>
    </div>
</div>