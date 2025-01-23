@extends('includes.auth.app')

@section('title')
    Reset password
@endsection

@section('content')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                {{-- <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Reset Password</span>
                                </a> --}}
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                                    </div>

                                    @include('includes.home.message')
                                    <form class="row g-3 needs-validation" action="" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Reset password</button>
                                        </div>
                                        
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have an account? <a href="{{ route('auth.register') }}">Register a new account</a></p>
                                            <p class="small mb-0"><a href="{{ route('auth.login') }}">Login</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
@endsection
