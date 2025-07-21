@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>State Form</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.states.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
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
                        <h3 class="card-title">State Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country_id">Select Country</label>
                                    <select name="country_id" class="form-control select2" data-placeholder="Select Country">
                                        <option value="" disabled selected>Select Country</option>
                                        @foreach ($countries as $countryId => $country)
                                            <option value="{{ $countryId }}"
                                                {{ $countryId == $object->country_id ? 'selected' : '' }}>{{ $country }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $object->name) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state_code">State Code</label>
                                    <input type="text" name="state_code" class="form-control" placeholder="Enter State Code" value="{{ old('state_code', $object->state_code) }}">
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
