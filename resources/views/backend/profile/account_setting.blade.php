@extends('includes.auth.app')
@section('title')
    Account Setting
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @include('includes.home.message')
                        <h5 class="card-title">Account Setting</h5>

                        <form class="row g-3" action="{{ route('backend.pages.update_account_setting') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$getUser->name}}">
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$getUser->email}}" readonly>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Profile picture</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                                <img src="{{$getUser->getProfile()}}" alt="{{$getUser->name}}" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
