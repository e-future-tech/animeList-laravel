@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container text-justify text-center">
    <div class="row">
        <div class="col-12">
            <div class="text-center rounded-3 border p-5 mb-4">
                <h3 class="border-bottom pb-2">ABOUT WEBSITE</h3>
                <P>This project is about an anime website where we can search for anime we like, add to wishlist or favorites. The API data that I use is from <a href="https://jikan.moe/" class="custom-a-link">Jikan.moe</a> and the technologies I use are as follows : </P>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="rounded-5 shadow py-5 px-4 mb-3">
                <img src="{{ asset('images/logo/php.webp') }}" class="mb-3" style="width: 8rem; height: 8rem; object-fit:contain">
                <h3 class="border-bottom">PHP</h3>
                <p>
                    PHP is a popular general-purpose scripting language that powers everything from your blog to the most popular websites in the world.
                </p>
            </div>
        </div>
        <div class="col col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="rounded-5 shadow py-5 px-4 mb-3">
                <img src="{{ asset('images/logo/laravel.webp') }}" class="mb-3" style="width: 8rem; height: 8rem; object-fit:contain">
                <h3 class="text-danger border-bottom">LARAVEL</h3>
                <p>
                    Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.
                </p>
            </div>
        </div>

        <div class="col col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="rounded-5 shadow py-5 px-4 mb-3">
                <img src="{{ asset('images/logo/bootstrap.webp') }}" class="mb-3" style="width: 8rem; height: 8rem; object-fit:contain">
                <h3 class="text-primary border-bottom">BOOTSTRAP 5</h3>
                <p>
                    Bootstrap 5 is the newest version of Bootstrap, which is the most popular HTML, CSS, and JavaScript framework for creating responsive, mobile-first websites.
                </p>
            </div>
        </div>

        <div class="col col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="rounded-5 shadow py-5 px-4 mb-3">
                <img src="{{ asset('images/logo/mysql.webp') }}" class="mb-3" style="width: 8rem; height: 8rem; object-fit:contain">
                <h3 class="border-bottom text-info">MYSQL</h3>
                <p>
                    Many of the world's largest and fastest-growing organizations including Facebook, Twitter, Booking.com, and Verizon rely on MySQL to save time and money powering their high-volume Web sites, business-critical systems and packaged software.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection