@extends('includes.auth.app')
@section('title')
    Add Page
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/tagsinput/bootstrap-tagsinput.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Page</h5>

                        <form class="row g-3" action="{{ route('backend.pages.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="inputName5" name="slug" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputName5" name="title" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control tinymce-editor">{{ old('description') }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="inputName5" name="meta_title" required value="{{ old('meta_title') }}">
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control tinymce-editor">{{ old('meta_description') }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="inputName5" name="meta_keywords" required value="{{ old('meta_keywords') }}">
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

@push('script')
    <script src="{{ asset('assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script>
        $("#tags").tagsinput();
    </script>
@endpush