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
                                <span class="d-none d-lg-block">Log-In</span>
                                <p></p>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <p class="text-center small">This is a secure area of the application. Please confirm your password before continuing.</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('password.confirm') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password">
                                        <div class="invalid-feedback">
                                            @foreach ($errors->get('password') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Confirm</button>
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
