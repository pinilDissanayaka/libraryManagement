@extends('auth.layout')
@section('main')
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.jpg" alt="">
                            </a>
                        </div>
                        <!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Verify Your Email</h5>
                                    <p class="text-center small">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                                </div>

                                @if (session('status') == 'verification-link-sent')
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle"></i>
                                        A new verification link has been sent to the email address you provided during registration.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Resend Verification Email</button>
                                    </div>
                                </form>

                                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="col-12">
                                        <button class="btn btn-secondary w-100" type="submit">Log Out</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

