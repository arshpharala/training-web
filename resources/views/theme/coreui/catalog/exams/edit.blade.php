@extends('theme.coreui.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">CMS</li>
    <li class="breadcrumb-item">Exam</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content-header')
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0">@lang('crud.edit_title', ['name' => 'Exam'])</h1>
        </div>
        <div class="col d-flex justify-content-end gap-2">
            <a href="{{ route('admin.catalog.exams.index') }}" type="button" class="btn btn-dark">
                @lang('crud.back_to_list', ['name' => 'Exam'])
            </a>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('admin.catalog.exams.update', $exam->id) }}" method="POST" enctype="multipart/form-data"
        class="ajax-form">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h5 class="card-title">Exam Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $exam->name) }}"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control"
                                value="{{ old('code', $exam->code) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Level</label>
                            <input type="text" name="level" class="form-control"
                                value="{{ old('level', $exam->level) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control"
                                value="{{ old('duration', $exam->duration) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            @if ($exam->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $exam->image) }}" alt="Exam Image" style="height:60px">
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $exam->description) }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-secondary">Update Exam</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
