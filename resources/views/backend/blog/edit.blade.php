@extends('includes.auth.app')
@section('title')
    Edit Blog
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Blog</h5>

                        <form class="row g-3" action="{{ route('backend.blog.update', $getRecord->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputName5" name="title"
                                    value="{{ $getRecord->title }}">
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($getCategory as $value)
                                        <option {{ $getRecord->category_id == $value->id ? 'selected' : '' }}
                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Image</label>
                                <input type="file" class="form-control" id="inputName5" name="image_file">
                                @if (!empty($getRecord->getImage()))
                                    <img class="img-fluid" style="width: 50px" src="{{ $getRecord->getImage() }}"
                                        alt="{{ $getRecord->title }}">
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control tinymce-editor">{{ $getRecord->description }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="inputName5" name="tags">
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" cols="30" rows="10"
                                    class="form-control tinymce-editor">{{ $getRecord->meta_description }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="inputName5" name="meta_keywords"
                                    value="{{ $getRecord->meta_keywords }}">
                            </div>

                            <div class="col-md-12">
                                <label for="is_publish" class="form-label">Published</label>
                                <select id="is_publish" class="form-select" name="is_publish">
                                    <option {{ $getRecord->is_publish == 1 ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{ $getRecord->is_publish == 0 ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="inputStatus" class="form-label">Status</label>
                                <select id="inputStatus" class="form-select" name="status">
                                    <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
