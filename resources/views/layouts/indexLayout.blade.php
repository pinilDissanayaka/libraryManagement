<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @yield('title')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="indexAssets/img/favicon.png" rel="icon">
  <link href="indexAssets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/indexAssets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/indexAssets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/indexAssets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/indexAssets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/indexAssets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/indexAssets/css/main.css" rel="stylesheet">
</head>

<body>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto">
                <h1 class="">ShelfSpace</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    @yield('nav')
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @if (Route::has('login'))
                @auth
                    @if ((Auth::user()->userType == 'admin'))
                        <a class="btn-getstarted" href="{{ route('admin_dashboard') }}">Dashboard</a>
                    @else
                        <a class="btn-getstarted" href="{{ route('user_dashboard') }}">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn-getstarted">Log in</a>
                @endauth
            @endif
        </div>
    </header>

    <main class="main">
        @yield('main')
    </main>

    <footer id="footer" class="footer position-relative">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="">ShelfSpace</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>The Library, Sabaragamuwa University of Sri Lanka</p>
                        <p>P.O Box 02, 70140, Belihuloya, Sri Lanka</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+(94)-(0)45-2280045 (Main Library)</span></p>
                        <p><strong>Email:</strong> <span>library@lib.sab.ac.lk</span></p>
                        <p class="mt-3"><strong>Opening Hours :</strong> <span>Monday to Friday: 9:00 AM - 6:00 PM, Saturday: 10:00 AM - 4:00 PM</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="forms/newsletter.php" method="post" class="php-email-form">
                        <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1">ShelfSpace</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="#"></a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/indexAssets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/indexAssets/vendor/php-email-form/validate.js"></script>
    <script src="/indexAssets/vendor/aos/aos.js"></script>
    <script src="/indexAssets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/indexAssets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/indexAssets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="/indexAssets/js/main.js"></script>

</body>

</html>

