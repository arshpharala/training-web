@extends('theme.coreui.layouts.app')
@section('breadcrumb')
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">CMS</li>
  <li class="breadcrumb-item">Testimonial</li>
  <li class="breadcrumb-item active">Create</li>
@endsection
@section('content-header')
  <x-coreui::content-header type="create" name="Testimonial" :indexRoute="route('admin.cms.testimonials.index')" />
@endsection

@section('content')
  <div class="row">
    {{-- Main Content --}}
    <div class="col-md-8">
      <div class="card card-secondary">
        <div class="card-header">
          <h5 class="card-title">Testimonial Details</h5>
        </div>
        <form action="{{ route('admin.cms.testimonials.store') }}" method="POST" class="ajax-form"
          enctype="multipart/form-data">
          @csrf
          <div class="card-body">

            {{-- Name Translations --}}
            @foreach (active_locals() as $locale)
              <div class="form-group mb-3">
                <label class="form-label" for="name_{{ $locale }}">Name ({{ strtoupper($locale) }})</label>
                <input type="text" name="name[{{ $locale }}]" class="form-control" required>
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="description_{{ $locale }}">Description ({{ strtoupper($locale) }})</label>
                <textarea name="description[{{ $locale }}]" class="form-control" required></textarea>
              </div>
            @endforeach

            <div class="form-group mb-3">
              <label class="form-label" for="designation">Designation</label>
              <input type="text" name="designation" class="form-control" required>
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
            <button type="submit" class="btn btn-secondary">@lang('crud.create')</button>
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
            <input type="number" name="rating" min="1" max="5" value="5" class="form-control"
              required>
          </div>
          {{-- Position --}}
          <div class="form-group mb-3">
            <label class="form-label" for="position">Position</label>
            <input type="number" name="position" class="form-control @error('position') is-invalid @enderror"
              value="{{ old('position', 0) }}">
            @error('position')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          {{-- Is Visible --}}
          <div class="form-group mb-3">
            <div class="custom-control custom-switch">
              <input type="checkbox" name="is_active" value="1" class="custom-control-input" id="is_active">
              <label class="form-label" class="custom-control-label" for="is_active">Is Active</label>
            </div>
          </div>

          <div class="form-group mb-3">
            <label class="form-label" for="company_name">Company Name</label>
            <input type="text" name="company_name" class="form-control">
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
