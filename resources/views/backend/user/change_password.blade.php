@extends('includes.auth.app')
@section('title')
    Change User Password
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @include('includes.home.message')
                        <h5 class="card-title">Change Password</h5>

                        <form class="row g-3" action="" method="POST">
                            @csrf

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Old Password</label>
                                <input type="password" class="form-control" id="inputPassword5" name="old_password" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="inputPassword5" name="new_password" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="inputPassword5" name="confirm_password" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
