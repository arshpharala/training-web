@extends('theme.adminlte.layouts.app')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Create Topic</h1>
    </div>
    <div class="col-sm-6">
        <a href="{{ route('admin.catalog.topics.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
    </div>
</div>
@endsection

@section('content')
<form action="{{ route('admin.catalog.topics.store') }}" method="POST" enctype="multipart/form-data" class="ajax-form">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header"><h3 class="card-title">Topic Information</h3></div>
                <div class="card-body">
                    @foreach (active_locals() as $locale)
                        <div class="form-group">
                            <label>Name ({{ strtoupper($locale) }})</label>
                            <input type="text" name="name[{{ $locale }}]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Short Description ({{ strtoupper($locale) }})</label>
                            <textarea name="short_description[{{ $locale }}]" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Content ({{ strtoupper($locale) }})</label>
                            <textarea name="content[{{ $locale }}]" class="form-control tinymce-editor"></textarea>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-secondary">Create Topic</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header"><h3 class="card-title">Options</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->translation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="number" name="position" class="form-control" value="0">
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" name="is_active" value="1" class="custom-control-input" id="is_active" checked>
                        <label class="custom-control-label" for="is_active">Active</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" name="is_featured" value="1" class="custom-control-input" id="is_featured">
                        <label class="custom-control-label" for="is_featured">Featured</label>
                    </div>
                    <div class="form-group"><label>Logo</label><input type="file" name="logo" class="form-control"></div>
                    <div class="form-group"><label>Icon</label><input type="file" name="icon" class="form-control"></div>
                    <div class="form-group"><label>Banner</label><input type="file" name="banner" class="form-control"></div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
