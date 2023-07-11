<header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="{{route('index')}}">PT LAPOR</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#features">Services</a></li>

                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/admin/home') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Admin</a>
                        </li>
                    @else
                        <li>
                            <a class="nav-link scrollto" href="{{ route('login') }}">Log In</a>
                        </li>
                        <li><span style="color:azure; font-size: 150%">|</span></li>
                        @if (Route::has('register'))
                            <li>
                                <a class="nav-link scrollto" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
