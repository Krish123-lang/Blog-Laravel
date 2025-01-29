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
                        <h5 class="card-title">Add category</h5>

                        <form class="row g-3" action="{{ route('backend.category.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName5" name="name" required value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputName5" name="title" required value="{{ old('title') }}">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="inputName5" name="meta_title" required value="{{ old('meta_title') }}">
                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control">{{ old('meta_description') }}</textarea>
                                <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="inputName5" name="meta_keywords" required value="{{ old('meta_keywords') }}">
                                <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
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
