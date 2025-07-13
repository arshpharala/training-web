@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Category</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.catalog.categories.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.catalog.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="ajax-form">
        @csrf
        @method('PUT')
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
                                    value="{{ old("name.$locale", $category->translations->where('locale', $locale)->first()?->name) }}" required>
                            </div>
                            <div class="form-group">
                                <label>Short Description ({{ strtoupper($locale) }})</label>
                                <textarea name="short_description[{{ $locale }}]" rows="6" class="form-control">{{ old("short_description.$locale", $category->translations->where('locale', $locale)->first()?->short_description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Content ({{ strtoupper($locale) }})</label>
                                <textarea name="content[{{ $locale }}]" class="form-control tinymce-editor" rows="4">{{ old("content.$locale", $category->translations->where('locale', $locale)->first()?->content) }}</textarea>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-secondary">Update Category</button>
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
                                        value="{{ old('slug', $category->slug) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="number" name="position" class="form-control"
                                        value="{{ old('position', $category->position) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" name="color" class="form-control" value="{{ old('color', $category->color) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_active" value="1" class="custom-control-input"
                                            id="is_active" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_featured" value="1"
                                            class="custom-control-input" id="is_featured"
                                            {{ old('is_featured', $category->is_featured) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_featured">Featured</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control" accept="image/*">
                                    @if ($category->logo)
                                        <div class="mt-1">
                                            <img src="{{ asset('storage/' . $category->logo) }}" style="width:50px; height:50px; object-fit:cover;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="file" name="icon" class="form-control" accept="image/*">
                                    @if ($category->icon)
                                        <div class="mt-1">
                                            <img src="{{ asset('storage/' . $category->icon) }}" style="width:50px; height:50px; object-fit:cover;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input type="file" name="banner" class="form-control" accept="image/*">
                                    @if ($category->banner)
                                        <div class="mt-1">
                                            <img src="{{ asset('storage/' . $category->banner) }}" style="width:100px; height:40px; object-fit:cover;">
                                        </div>
                                    @endif
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
