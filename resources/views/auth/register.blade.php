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
                                <span class="d-none d-lg-block">Register</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Register as a User</h5>
                                </div>

                                <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="col-12">
                                        <label for="name" class="form-label" >Name :</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name" :value="old('name')" autofocus autocomplete="name" required>
                                            <div class="invalid-feedback">
                                                @foreach ($errors->get('name') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label" >Email :</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" :value="old('email')" autofocus autocomplete="username" required>
                                            <div class="invalid-feedback">
                                                @foreach ($errors->get('email') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" autocomplete="new-password" required>
                                        <div class="invalid-feedback">
                                            @foreach ($errors->get('password') as $error)
                                                    {{ $error }}
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" autocomplete="new-password" required>
                                        <div class="invalid-feedback">
                                            @foreach ($errors->get('password_confirmation') as $error)
                                                    {{ $error }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Resister</button>
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
