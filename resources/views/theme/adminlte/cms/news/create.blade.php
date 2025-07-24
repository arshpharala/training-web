@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>News Form</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.news.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.cms.news.store') }}" method="POST" enctype="multipart/form-data" class="ajax-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">News Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="is_guide"
                                    name="is_guide">
                                <label class="form-check-label" for="is_guide">
                                    Is Guide
                                </label>
                            </div>
                        </div>


                        @foreach (active_locals() as $locale)
                            <div class="form-group">
                                <label for="title">Title ({{ strtoupper($locale) }})</label>
                                <input type="text" name="title[{{ $locale }}]" class="form-control"
                                    placeholder="Enter Title" required>
                            </div>

                            <div class="form-group">
                                <label for="intro">Intro ({{ strtoupper($locale) }})</label>
                                <textarea class="form-control" name="short_description[{{ $locale }}]" cols="4" rows="6"
                                    placeholder="Write content here..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="content">Content ({{ strtoupper($locale) }})</label>
                                <textarea class="form-control tinymce-editor" name="content[{{ $locale }}]" cols="4" rows="6"
                                    placeholder="Write content here..."></textarea>
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
                                    <label for="country_id">Select Category</label>
                                    <select name="category_id" class="form-control select2">
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $news->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->translation->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

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
                                    <label>Banner</label>
                                    <input type="file" name="banner" class="form-control" accept="image/*">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                @include('theme.adminlte.components._metas', [
                    'model' => $news,
                    'grid' => 'col-12',
                ])
            </div>

        </div>
    </form>
@endsection
