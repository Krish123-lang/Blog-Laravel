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
                        <h5 class="card-title">Blog List
                            <a href="{{ route('backend.blog.add') }}" class="btn btn-sm btn-primary float-end">Add new</a>
                        </h5>

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
