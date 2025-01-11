@extends('auth.layout')
@section('main')
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.jpg" alt="logo">
                                <span class="d-none d-lg-block">Forgot your password</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Forgot your password?</h5>
                                    <p class="text-center small">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                                    <div class="credits">
                                        @if (session('status'))
                                            <label for="sessionStatus" class="form-label">{{ session('status') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('password.email') }}">
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
                                        <button class="btn btn-primary w-100" type="submit">Email Password Reset Link</button>
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
