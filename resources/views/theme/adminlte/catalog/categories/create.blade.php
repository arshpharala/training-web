@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create Category</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.catalog.categories.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.catalog.categories.store') }}" method="POST" enctype="multipart/form-data" class="ajax-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Category Information</h3>
                    </div>
                    <div class="card-body">
                        @foreach (active_locals() as $locale)
                            <div class="form-group">
                                <label>Name ({{ strtoupper($locale) }})</label>
                                <input type="text" name="name[{{ $locale }}]" class="form-control"
                                    value="{{ old("name.$locale") }}" required>
                            </div>
                            <div class="form-group">
                                <label>Short Description ({{ strtoupper($locale) }})</label>
                                <textarea name="short_description[{{ $locale }}]" rows="6" class="form-control">{{ old("short_description.$locale") }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Content ({{ strtoupper($locale) }})</label>
                                <textarea name="content[{{ $locale }}]" class="form-control tinymce-editor" rows="4">{{ old("content.$locale") }}</textarea>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-secondary">Create Category</button>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Options</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        value="{{ old('slug') }}" required>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="number" name="position" class="form-control"
                                        value="{{ old('position') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" name="color" class="form-control" value="{{ old('color') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_active" value="1" class="custom-control-input"
                                            id="is_active" {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_featured" value="1"
                                            class="custom-control-input" id="is_featured"
                                            {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_featured">Featured</label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="file" name="icon" class="form-control" accept="image/*">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input type="file" name="banner" class="form-control" accept="image/*">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                @include('theme.adminlte.components._metas', [
                    'model' => $category,
                    'grid' => 'col-12',
                ])
            </div>
        </div>
    </form>
@endsection
