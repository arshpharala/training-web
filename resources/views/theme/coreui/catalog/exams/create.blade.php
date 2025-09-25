@extends('theme.coreui.layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">CMS</li>
    <li class="breadcrumb-item">Exam</li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section('content-header')
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0">@lang('crud.create_title', ['name' => 'Exam'])</h1>
        </div>
        <div class="col d-flex justify-content-end gap-2">
            <a href="{{ route('admin.catalog.exams.index') }}" type="button" class="btn btn-dark">
                @lang('crud.back_to_list', ['name' => 'Exam'])
            </a>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.catalog.exams.store') }}" method="POST" enctype="multipart/form-data" class="ajax-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h5 class="card-title">Exam Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3"><label>Name</label><input type="text" name="name"
                                class="form-control" required></div>
                        <div class="form-group mb-3"><label>Code</label><input type="text" name="code"
                                class="form-control"></div>
                        <div class="form-group mb-3"><label>Level</label><input type="text" name="level"
                                class="form-control"></div>
                        <div class="form-group mb-3"><label>Duration</label><input type="text" name="duration"
                                class="form-control"></div>
                        <div class="form-group mb-3"><label>Image</label><input type="file" name="image"
                                class="form-control"></div>
                        <div class="form-group mb-3"><label>Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-secondary">Create Exam</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
