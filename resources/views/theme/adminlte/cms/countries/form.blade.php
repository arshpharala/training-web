@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Country Form</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.countries.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
        </div>
    </div>
@endsection
@section('content')
<div class="col-sm-12">
    <!-- form start -->
    <form class="ajax-form" action="{{ $url }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method($method === 'PUT' ? 'PUT' : 'POST')
        <input type="hidden" name="id" value="{{ $object->id }}">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Country Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $object->name) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="iso2">Iso2</label>
                                    <input type="text" name="iso2" class="form-control" placeholder="Enter Iso2" value="{{ old('iso2', $object->iso2) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="iso3">Iso3</label>
                                    <input type="text" name="iso3" class="form-control" placeholder="Enter Iso3" value="{{ old('iso3', $object->iso3) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numeric_code">Numeric Code</label>
                                    <input type="text" name="numeric_code" class="form-control" placeholder="Enter Numeric Code" value="{{ old('numeric_code', $object->numeric_code) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone_code">Phone Code</label>
                                    <input type="text" name="phone_code" class="form-control" placeholder="Enter Phone Code" value="{{ old('phone_code', $object->phone_code) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <input type="text" name="currency" class="form-control" placeholder="Enter Currency" value="{{ old('currency', $object->currency) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" id="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- form end -->
</div>
@endsection
