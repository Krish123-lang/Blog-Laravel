@extends('includes.auth.app')
@section('title')
    Blog List
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('includes.home.message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blog List ({{$getRecord->total()}})
                            <a href="{{ route('backend.blog.add') }}" class="btn btn-sm btn-primary float-end">Add new</a>
                        </h5>

                        <form class="row" method="GET" action="">
                            <div class="col-md-1 mb-2">
                                <label for="inputNanme4" class="form-label">ID</label>
                                <input type="text" name="id" value="{{ Request::get('id') }}" class="form-control">
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="inputNanme4" class="form-label">Username</label>
                                <input type="text" name="username" value="{{ Request::get('username') }}" class="form-control">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="inputNanme4" class="form-label">Title</label>
                                <input type="text" name="title" value="{{ Request::get('title') }}" class="form-control">
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="inputNanme4" class="form-label">Category</label>
                                {{-- <input type="text" name="category" value="{{ Request::get('category') }}" class="form-control"> --}}
                                {{-- <select name="category" id="">
                                    <option value="{{ Request::get('category') }}">{{ Request::get('category') }}</option>
                                </select> --}}

                                <select name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($getCategory as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                
                            </div>
                            
                            <div class="col-md-2 mb-2">
                                <label for="inputNanme4" class="form-label">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ Request::get('status') == 1?'selected':'' }} value="1">Active</option>
                                    <option {{ Request::get('status') == 100?'selected':'' }} value="100">Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <label for="inputNanme4" class="form-label">Publish</label>
                                <select name="is_publish" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ Request::get('is_publish') == 1 ? 'selected':'' }} value="1">Yes</option>
                                    <option {{ Request::get('is_publish') == 100?'selected':'' }} value="100">No</option>
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <label for="inputNanme4" class="form-label">Start Date</label>
                                <input type="date" name="start_date" value="{{ Request::get('start_date') }}" class="form-control">
                            </div>

                            <div class="col-md-2 mb-2">
                                <label for="inputNanme4" class="form-label">End Date</label>
                                <input type="date" name="end_date" value="{{ Request::get('end_date') }}" class="form-control">
                            </div>

                            <div class="col-md-2 d-flex align-items-end justify-content-center gap-2 mb-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('backend.blog.list') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                        <hr>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Publish</th>
                                    <th scope="col">Created date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>
                                            @if (!empty($value->getImage()))
                                                <img class="img-fluid" style="width: 50px" src=" {{ $value->getImage() }}"
                                                    alt="{{ $value->title }}">
                                            @endif
                                        </td>
                                        <td>{{ $value->user_name }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->category_name }}</td>
                                        <td>{{ !empty($value->status) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ !empty($value->is_publish) ? 'Yes' : 'No' }}</td>
                                        <td>{{ date('Y-m-d H:i A', strtotime($value->created_at)) }} </td>
                                        <td>
                                            <a href="{{ route('backend.blog.edit', $value->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('backend.blog.delete', $value->id) }}" method="post"
                                                onsubmit="return confirm('Are you sure you want to delete the blog {{ $value->name }}?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center fw-bold">No blogs found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
