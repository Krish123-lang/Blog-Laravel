@extends('includes.auth.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('includes.home.message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User List
                            <a href="{{ route('backend.user.add') }}" class="btn btn-sm btn-primary float-end">Add new</a>
                        </h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Email Verified</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ !empty($value->email_verified_at) ? 'Yes' : 'No' }}</td>
                                        <td>{{ !empty($value->status) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ date('Y-m-d H:i A', strtotime($value->created_at)) }} </td>
                                        <td>
                                            <a href="{{ route('backend.user.edit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            {{-- <a onclick="return confirm('Are you sure?')" href="{{ route('backend.user.delete', $value->id) }}" class="btn btn-sm btn-danger">Delete</a> --}}

                                            <form action="{{ route('backend.user.delete', $value->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete the user {{ $value->name }}?');">
                                                @csrf
                                                @method('DELETE')
                
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center fw-bold">No users found!</td>
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
