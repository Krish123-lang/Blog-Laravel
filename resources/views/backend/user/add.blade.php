@extends('includes.auth.app')
@section('title')
    Add User
@endsection

@section('content')
    
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add User</h5>

            <form class="row g-3" action="{{ route('backend.user.store') }}" method="POST">
            @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label"> Name</label>
                <input type="text" class="form-control" id="inputName5" name="name" required value="{{old('name')}}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
              <div class="col-md-12">
                <label for="inputEmail5" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail5" name="email" required value="{{old('email')}}">
                <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword5" name="password" required>
                <span class="text-danger">{{ $errors->first('password') }}</span>
              </div>
             
              <div class="col-md-12">
                <label for="inputStatus" class="form-label">Status</label>
                <select id="inputStatus" class="form-select" name="status">
                 <option {{ old('status'==1)?'selected':'' }} value="1">Active</option>
                 <option {{ old('status'==0)?'selected':'' }} value="0">Inactive</option>
                </select>
              </div>
              
              <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
