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
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="col-12">
                                        <label for="email" class="form-label" >Email :</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" :value="old('email')" required autofocus autocomplete="username" required>
                                            <div class="invalid-feedback">
                                                @foreach ($errors->get('email') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                        <div class="invalid-feedback">
                                            @foreach ($errors->get('password') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember_me">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" style="color:rgb(0, 0, 0);">Forgot your password?</a>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
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
