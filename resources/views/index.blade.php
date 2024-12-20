@extends('layouts.indexLayout')

@section('title')
    <title>Home</title>
@endsection

@section('nav')
    <li><a href="{{ route('index') }}" class="active">Home</a></li>
@endsection

@section('main')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <img src="indexAssets/img/hero-bg.jpg" alt="" data-aos="fade-in">

        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="100" class="">Reading Today,<br>Leading Tomorrow</h2>
            @if (Route::has('login'))
                @auth
                    <a class="btn-get-started" href="{{ url('/user-dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-get-started">Log in</a>
                @endauth
            @endif
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="indexAssets/img/about.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <p class="fst-italic">At SHELFSPACE, we believe in the power of knowledge and the importance of accessible
                        information. Our library management system is designed to offer a seamless experience for all
                        our users, enabling them to explore, discover, and utilize our vast collection of books, journals,
                        and digital resources. Our mission is to foster a community of learning and to support the
                        educational and informational needs of our patrons.
                    </p>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="">Books</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="">Newspapers</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="">Magazines</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Counts Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-box">
                    <h3>Services</h3>
                    <p>Our library offers a wide range of services to ensure that you have everything you need for your research, study, or leisure reading. Our services include:</p>
                    <div class="text-center">
                        <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div><!-- End Why Box -->

            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-xl-4">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-clipboard-data"></i>
                            <h4>Book Borrowing</h4>
                            <p>Easily search for and borrow books from our extensive collection.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-gem"></i>
                            <h4>Digital Resources</h4>
                            <p>Get assistance from our knowledgeable staff for any research queries.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-inboxes"></i>
                            <h4>Study Spaces</h4>
                            <p>Comfortable and quiet study areas are available for individual or group study.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-inboxes"></i>
                            <h4>Workshops and Events</h4>
                            <p>Participate in workshops, seminars, and events organized by the library.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-inboxes"></i>
                            <h4>Inter Library Loan</h4>
                            <p>Request books and articles from other libraries if they are not available in our collection.</p>
                        </div>
                    </div><!-- End Icon Box -->
                </div>
            </div>
        </div>
    </section>
    <!-- /Why Us Section -->
@endsection



