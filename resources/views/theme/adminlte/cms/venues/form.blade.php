@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Venue Form</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.venues.index') }}" class="btn btn-secondary float-sm-right">Back to List</a>
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
                        <h3 class="card-title">Venue Information</h3>
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
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required value="{{ old('name', $object->name) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image_1">Image 1</label>
                                    <input type="file"  @if(empty($object->image_1)) required @endif name="image_1" class="form-control-file" id="image_1" accept="image/*" onchange="previewImage(event, 'imagePreview1')">
                                    <div class="image-preview" id="imagePreview1">
                                        @if(!empty($object->image_1))
                                            <img src="{{ asset($object->image_1) }}" alt="" style="width: 100px; height: 100px;">
                                        @endif
                                    </div>
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
@push("scripts")
<script>
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const output = document.getElementById(previewId);
            output.innerHTML = ''; // Clear previous preview

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(){
                    output.innerHTML = `<img src="${reader.result}" alt="Image Preview" style="width: 100px; height: 100px;">`;
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select a valid image file.');
                event.target.value = ''; // Clear the input field
            }
        }
</script>
@endpush
