@extends('includes.auth.app')
@section('title')
    Edit Categories
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Category</h5>

                        <form class="row g-3" action="{{ route('backend.category.update', $getRecord->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName5" name="name" required
                                    value="{{ $getRecord->name }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputName5" name="title" required
                                    value="{{ $getRecord->title }}">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="inputName5" name="meta_title" required
                                    value="{{ $getRecord->meta_title }}">
                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control">{{ $getRecord->meta_description }}</textarea>
                                <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="inputName5" name="meta_keywords" required value="{{ $getRecord->meta_keywords }}">
                                <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                            </div>

                            <div class="col-md-12">
                                <label for="inputStatus" class="form-label">Menu</label>
                                <select id="inputStatus" class="form-select" name="is_menu">
                                    <option {{ ($getRecord->is_menu == 1) ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{ ($getRecord->is_menu == 0) ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="inputStatus" class="form-label">Status</label>
                                <select id="inputStatus" class="form-select" name="status">
                                    <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Inactive</option>
                
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
