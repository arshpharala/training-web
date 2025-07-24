@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>State Form</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.cities.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
        </div>
    </div>
@endsection
@section('content')
<div class="col-sm-12">
    <!-- form start -->
    <form action="{{ $url }}" class="ajax-form" enctype="multipart/form-data" method="POST">
        @csrf
        @method($method === 'PUT' ? 'PUT' : 'POST')
        <input type="hidden" name="id" value="{{ $object->id }}">
        <div class="row">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">City Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state_id">Select State</label>
                                <select name="state_id" class="form-control select2" data-placeholder="Select State">
                                    <option value="" disabled selected>Select State</option>
                                    @foreach($countriesStates as $country)
                                        @if ($country->states->count())
                                            <optgroup label="{{ $country->name }}">
                                                @foreach($country->states as $state)
                                                    <option value="{{ $state->id }}" {{ $state->id == $object->state_id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $object->name) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" id="submit" class="btn btn-secondary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
