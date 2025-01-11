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
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">
                                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="col-12">
                                        <label for="email" class="form-label" >Email :</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" :value="old('email', $request->email)" required autofocus autocomplete="username">
                                            <div class="invalid-feedback">
                                                @foreach ($errors->get('email') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required autocomplete="new-password">
                                        <div class="invalid-feedback">
                                            @foreach ($errors->get('password') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password_confirmation" class="form-label">Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="password_confirmation" required autocomplete="new-password">
                                        <div class="invalid-feedback">
                                            @foreach ($errors->get('password_confirmation') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Reset Password</button>
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

