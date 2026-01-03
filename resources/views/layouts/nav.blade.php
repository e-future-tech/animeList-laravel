<nav class="navbar navbar-expand-lg">
    <div class="container">

        <div>
            <a href="/" class="d-inline"><img src="{{ asset('images/logo/01.webp') }}" alt="logo" style="width: 40px;"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" aria-current="page" href="/seasons">Seasons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" aria-current="page" href="/top">Top Anime</a>
                </li>
                <li class="nav-item">
                    <form action="/top" method="get">
                        <input type="hidden" name="filter" value="upcoming">

                        <button type="submit" class="nav-link custom-nav-link w-100 text-start">Top Upcoming</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" aria-current="page" href="/about">About</a>
                </li>

                @if( Auth::user() )
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle custom-nav-link text-capitalize border rounded-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            👤{{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu bg-white mt-1" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="/favorites">
                                Favorites
                            </a>
                            <a class="dropdown-item" href="/wishlists">
                                Wishlist
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Log Out') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

                @else
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>

    <div>

    </div>
</nav>