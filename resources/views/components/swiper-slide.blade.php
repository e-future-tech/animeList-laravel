@props(['result', 'title'])


<div class="container rounded-5 shadow py-3 overflow-hidden mb-5 position-relative">
    <div class="swipper anime py-4">
        <h6 class="text-center mb-3">{{ $title }}</h6>

        <div class="swiper-wrapper">
            @foreach( $result as $key => $item )
            <div class="swiper-slide text-center">
                <a href="/detail/{{ $item['mal_id'] }}" class="custom-btn-cover">
                    <img src='{{ $item["images"]["webp"]["image_url"] }}' class="rounded-3 shadow-sm mb-2">
                </a>
                <p>{{ strlen($item['title']) > 20 ? Str::limit( $item['title'], 20) : $item['title'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="swiper-pagination position-absolute mb-2"></div>
    </div>
</div>