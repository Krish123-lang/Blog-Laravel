@extends('includes.auth.app')
@section('title')
    Add category
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Blog</h5>

                        <form class="row g-3" action="{{ route('backend.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputName5" name="title" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($getCategory as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Image</label>
                                <input type="file" class="form-control" id="inputName5" name="image_file">
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control tinymce-editor">{{ old('description') }}</textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="inputName5" name="tags">
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control tinymce-editor">{{ old('meta_description') }}</textarea>
                                <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="inputName5" name="meta_keywords" required value="{{ old('meta_keywords') }}">
                                <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="is_publish" class="form-label">Published</label>
                                <select id="is_publish" class="form-select" name="is_publish">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="inputStatus" class="form-label">Status</label>
                                <select id="inputStatus" class="form-select" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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

@push('script')
@endpush