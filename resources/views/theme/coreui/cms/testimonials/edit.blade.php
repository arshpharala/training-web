@extends('theme.coreui.layouts.app')
@section('breadcrumb')
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">CMS</li>
  <li class="breadcrumb-item">Testimonial</li>
  <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content-header')
  <div class="row mb-3">
    <div class="col">
      <h1 class="h3 mb-0">@lang('crud.edit_title', ['name' => 'Testimonial'])</h1>
    </div>
    <div class="col d-flex justify-content-end gap-2">
      <a href="{{ route('admin.cms.testimonials.index') }}" type="button" class="btn btn-dark">
        @lang('crud.back_to_list', ['name' => 'Testimonial'])
      </a>
    </div>
  </div>
@endsection


@section('content')
  <div class="row">
    {{-- Main Content --}}
    <div class="col-md-8">
      <div class="card card-secondary">
        <div class="card-header">
          <h5 class="card-title">Testimonial Details</h5>
        </div>
        <form action="{{ route('admin.cms.testimonials.update', $testimonial) }}" method="POST" class="ajax-form"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">

            {{-- Name Translations --}}
            @foreach (active_locals() as $locale)
              <div class="form-group mb-3">
                <label class="form-label" for="name_{{ $locale }}">Name ({{ strtoupper($locale) }})</label>
                <input type="text" name="name[{{ $locale }}]"
                  value="{{ $testimonial->translations->where('locale', $locale)->first()?->name }}" class="form-control"
                  required>
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="description_{{ $locale }}">Description ({{ strtoupper($locale) }})</label>
                <textarea name="description[{{ $locale }}]" class="form-control" required>{{ $testimonial->translations->where('locale', $locale)->first()?->description }}</textarea>
              </div>
            @endforeach

            <div class="form-group mb-3">
              <label class="form-label" for="designation">Designation</label>
              <input type="text" name="designation" value="{{ $testimonial->designation }}" class="form-control"
                required>
            </div>

            {{-- Icon --}}
            <div class="form-group mb-3">
              <label class="form-label">Image</label>
              <input type="file" name="image" class="form-control" accept="image/*">

              @if (isset($testimonial) && $testimonial->image)
                <div class="mt-2">
                  <img src="{{ asset('storage/' . $testimonial->image) }}" class="img-lg img-thumbnail">
                </div>
              @endif
            </div>

          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-secondary">@lang('crud.update')</button>
          </div>
      </div>
    </div>

    {{-- Sidebar Card (Meta/Options) --}}
    <div class="col-md-4">
      <div class="card card-secondary">
        <div class="card-header">
          <h5 class="card-title">Testimonial Options</h5>
        </div>
        <div class="card-body">
          <div class="form-group mb-3">
            <label class="form-label" for="position">Rating</label>
            <input type="number" name="rating" min="1" max="5" value="5"
              value="{{ $testimonial->rating }}" class="form-control" required>
          </div>
          {{-- Position --}}
          <div class="form-group mb-3">
            <label class="form-label" for="position">Position</label>
            <input type="number" name="position" class="form-control" value="{{ $testimonial->position }}">
          </div>

          {{-- Is Visible --}}
          <div class="form-group mb-3">
            <div class="custom-control custom-switch">
              <input type="checkbox" name="is_active" value="1" class="custom-control-input" id="is_active"
                @checked($testimonial->is_active)>
              <label class="form-label" class="custom-control-label" for="is_active">Is Active</label>
            </div>
          </div>

          <div class="form-group mb-3">
            <label class="form-label" for="company_name">Company Name</label>
            <input type="text" name="company_name" class="form-control" value="{{ $testimonial->company_name }}">
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Compnay Logo</label>
            <input type="file" name="company_logo" class="form-control" accept="image/*">

            @if (isset($testimonial) && $testimonial->company_logo)
              <div class="mt-2">
                <img src="{{ asset('storage/' . $testimonial->company_logo) }}" class="img-lg img-thumbnail">
              </div>
            @endif
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
