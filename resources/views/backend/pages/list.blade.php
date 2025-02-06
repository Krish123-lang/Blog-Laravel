@extends('includes.auth.app')
@section('title')
    Pages List
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('includes.home.message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pages List
                            <a href="{{ route('backend.pages.add') }}" class="btn btn-sm btn-primary float-end">Add new</a>
                        </h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Meta Title</th>
                                    <th scope="col">Created date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->slug }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->meta_title }}</td>
                                        <td>{{ date('Y-m-d H:i A', strtotime($value->created_at)) }} </td>
                                        <td>
                                            <a href="{{ route('backend.pages.edit', $value->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>

                                                <form action="{{ route('backend.pages.delete', $value->id) }}" method="post"
                                                    onsubmit="return confirm('Are you sure you want to delete the page {{ $value->title }}?');">
                                                    @csrf
                                                    @method('DELETE')
    
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center fw-bold">No page found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
