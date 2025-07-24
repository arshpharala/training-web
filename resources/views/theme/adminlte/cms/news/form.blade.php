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
                        <h3 class="card-title">News Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country_id">Select Country</label>
                                    <select name="category_id" class="form-control select2">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $object->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->slug }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($object->is_guide) checked @endif value="1" id="is_guide" name="is_guide">
                                        <label class="form-check-label" for="is_guide">
                                            Is Guide
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required value="{{ old('title', $object->title) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="slug">slug</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Enter slug" required value="{{ old('slug', $object->slug) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="intro">intro</label>
                                    <input type="text" name="intro" class="form-control" placeholder="Enter intro" required value="{{ old('intro', $object->intro) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" cols="4" rows="6" placeholder="Write content here...">{{ old('content', $object->content) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image_1">Image</label>
                                    <input type="file"  @if(empty($object->image)) required @endif name="image" class="form-control-file" id="image" accept="image/*" onchange="previewImage(event, 'imagePreview1')">
                                    <div class="image-preview" id="imagePreview1">
                                        @if(!empty($object->image))
                                            <img src="{{ asset($object->image) }}" alt="" style="width: 100px; height: 100px;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Meta Title">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title" required value="{{ old('meta_title', $object->meta_title) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Meta Description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" cols="4" rows="6" value="{{ old('meta_description', $object->meta_description) }}" placeholder="Write a description here.."></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Meta Keywords">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" required value="{{ old('meta_keywords', $object->meta_keywords) }}">
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
