@include('layout_home.header')

<body>

    <!-- ======= Nav ======= -->
    @include('layout_home.nav')
    <!-- End Nav -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div class="my-3">
            &nbsp;
        </div>
        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Ditemukan Section ======= -->
        <section id="ditemukan" class="about">
            <div class="container">

                <div class="section-title mx-5" data-aos="zoom-out">
                    <h2>Barang Ditemukan</h2>
                    <p>List Barang Ditemukan</p>
                </div>

                <div class="row content  mx-5" data-aos="fade-up">
                    @foreach ($ditemukan as $item)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset($item->foto)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{$item->lokasi}}, {{$item->no_polisi}}</h5>
                                  <p class="card-text">{{$item->spesifikasi}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layout_home.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layout_home.script')

</body>

</html>
