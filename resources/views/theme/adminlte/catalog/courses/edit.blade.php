@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Course</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.catalog.courses.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.catalog.courses.update', $course) }}" method="POST" enctype="multipart/form-data"
        class="ajax-form">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Course Information</h3>
                    </div>
                    <div class="card-body">
                        @foreach (active_locals() as $locale)
                            <div class="form-group">
                                <label>Name ({{ strtoupper($locale) }})</label>
                                <input type="text" name="name[{{ $locale }}]" class="form-control"
                                    value="{{ $course->translations->where('locale', $locale)->first()->name ?? null }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Short Description ({{ strtoupper($locale) }})</label>
                                <textarea name="short_description[{{ $locale }}]" rows="6" class="form-control">{{ $course->translations->where('locale', $locale)->first()->short_description ?? null }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Overview ({{ strtoupper($locale) }})</label>
                                <textarea name="overview[{{ $locale }}]" class="form-control tinymce-editor" rows="4">{{ $course->translations->where('locale', $locale)->first()->overview ?? null }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Who Should Attend ({{ strtoupper($locale) }})</label>
                                <textarea name="who_should_attend[{{ $locale }}]" class="form-control tinymce-editor" rows="4">{{ $course->translations->where('locale', $locale)->first()->who_should_attend ?? null }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Prerequisites ({{ strtoupper($locale) }})</label>
                                <textarea name="who_should_attend[{{ $locale }}]" class="form-control tinymce-editor" rows="4">{{ $course->translations->where('locale', $locale)->first()->who_should_attend ?? null }}</textarea>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-secondary">Update Course</button>
                    </div>
                </div>

                @include('theme.adminlte.components._faqs', [
                    'model' => $course,
                    'grid' => 'col-12',
                ])

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
                                    <label for="topic_id">Topic</label>
                                    <select name="topic_id" class="form-control" required>
                                        <option value="">Select Topic</option>
                                        @foreach ($categories as $category)
                                            <optgroup label="{{ $category->translation->name }}">
                                                @foreach ($category->topics as $topic)
                                                    <option value="{{ $topic->id }}" @selected($topic->id == $course->topic_id)>
                                                        {{ $topic->translation->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ $course->slug }}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    {!! Form::select('level', [1 => 'Beginer', 2 => 'Advanced', 3 => 'Professional'], $course->level, ['class' => 'form-control','placeholder' => 'Select an option']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="level">Code</label>
                                    {!! Form::text('code', $course->code, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Duration</label>
                                    <input type="number" name="duration" value="{{ $course->duration }}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="number" name="position" class="form-control"
                                        value="{{ old('position', $course->position) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" name="color" class="form-control"
                                        value="{{ old('color', $course->color) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_active" value="1" class="custom-control-input"
                                            id="is_active" @checked($course->is_active)>
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_latest" value="1" class="custom-control-input"
                                            id="is_latest" @checked($course->is_latest)>
                                        <label class="custom-control-label" for="is_latest">Latest</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_popular" value="1" class="custom-control-input"
                                            id="is_popular" @checked($course->is_popular)>
                                        <label class="custom-control-label" for="is_popular">Popular</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_trending" value="1"
                                            class="custom-control-input" id="is_trending" @checked($course->is_trending)>
                                        <label class="custom-control-label" for="is_trending">Trending</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="is_featured" value="1"
                                            class="custom-control-input" id="is_featured" @checked($course->is_featured)>
                                        <label class="custom-control-label" for="is_featured">Featured</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" name="exam_included" value="1"
                                            class="custom-control-input" id="exam_included" @checked($course->exam_included)>
                                        <label class="custom-control-label" for="exam_included">Exam Included</label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control" accept="image/*">
                                    @if ($course->logo)
                                        <div class="mt-1">
                                            <img src="{{ asset('storage/' . $course->logo) }}"
                                                style="width:50px; height:50px; object-fit:cover;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="file" name="icon" class="form-control" accept="image/*">
                                    @if ($course->icon)
                                        <div class="mt-1">
                                            <img src="{{ asset('storage/' . $course->icon) }}"
                                                style="width:50px; height:50px; object-fit:cover;">
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input type="file" name="banner" class="form-control" accept="image/*">
                                    @if ($course->banner)
                                        <div class="mt-1">
                                            <img src="{{ asset('storage/' . $course->banner) }}"
                                                style="width:100px; height:40px; object-fit:cover;">
                                        </div>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                @include('theme.adminlte.components._delivery-methods', [
                    'model' => $course,
                    'deliveryMethods' => $deliveryMethods,
                ])
                @include('theme.adminlte.components._metas', [
                    'model' => $course,
                    'grid' => 'col-12',
                ])



            </div>
        </div>
    </form>
@endsection
