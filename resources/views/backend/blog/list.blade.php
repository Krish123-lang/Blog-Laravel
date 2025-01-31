@extends('includes.auth.app')
@section('title')
    Category List
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Meta title</th>
                                    <th scope="col">Meta description</th>
                                    <th scope="col">Meta keywords</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>

                        {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
