@extends('theme.coreui.layouts.app')
@section('breadcrumb')
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">CMS</li>
  <li class="breadcrumb-item">News</li>
  <li class="breadcrumb-item active">Create</li>
@endsection
@section('content-header')
  <div class="row mb-3">
    <div class="col">
      <h1 class="h3 mb-0">@lang('crud.create_title', ['name' => 'News'])</h1>
    </div>
    <div class="col d-flex justify-content-end gap-2">
      <a href="{{ route('admin.cms.news.index') }}" type="button" class="btn btn-dark">
        @lang('crud.back_to_list', ['name' => 'News'])
      </a>
    </div>
  </div>
@endsection

@section('content')
  <form action="{{ route('admin.cms.news.store') }}" method="POST" class="ajax-form" enctype="multipart/form-data">
    <div class="row">
      {{-- Main Content --}}
      <div class="col-md-8">
        <div class="card card-secondary">
          <div class="card-header">
            <h5 class="card-title">News Details</h5>
          </div>
          @csrf
          <div class="card-body">

            <div class="form-group mb-3">
              <label class="form-label" for="">Category</label>
              <select name="category_id" id="" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->translation->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group mb-3">
              <label class="form-label" for="">Slug <small>( {{ env('APP_URL') . '/blog/...' }} )</small> </label>
              <input type="text" name="slug" class="form-control" required>
            </div>

            {{-- Name Translations --}}
            @foreach (active_locals() as $locale)
              <div class="form-group mb-3">
                <label class="form-label" for="title_{{ $locale }}">Name ({{ strtoupper($locale) }})</label>
                <input type="text" name="title[{{ $locale }}]" class="form-control" required>
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="intro_{{ $locale }}">Intro ({{ strtoupper($locale) }})</label>
                <textarea name="intro[{{ $locale }}]" class="form-control tinymce-editor"></textarea>
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="description_{{ $locale }}">Description
                  ({{ strtoupper($locale) }})
                </label>
                <textarea name="description[{{ $locale }}]" class="form-control tinymce-editor"></textarea>
              </div>
            @endforeach

          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-4">
                <button type="submit" class="btn btn-secondary">@lang('crud.create')</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Sidebar Card (Meta/Options) --}}
      <div class="col-md-4">
        <div class="card card-secondary">
          <div class="card-header">
            <h5 class="card-title">News Options</h5>
          </div>
          <div class="card-body">

            <div class="form-group mb-3">
              <label class="form-label" for="designation">Author</label>
              <input type="text" name="author" class="form-control" required>
            </div>
            {{-- Position --}}
            <div class="form-group mb-3">
              <label class="form-label" for="position">Position</label>
              <input type="number" name="position" class="form-control">
            </div>

            {{-- Is Visible --}}
            <div class="form-group mb-3">
              <div class="custom-control custom-switch">
                <input type="checkbox" name="is_active" value="1" class="custom-control-input" id="is_active">
                <label class="form-label" class="custom-control-label" for="is_active">Is Active</label>
              </div>
            </div>

            <div class="form-group mb-3">
              <label class="form-label" for="">Published At</label>
              <input type="datetime-local" name="published_at" class="form-control" required>
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Image</label>
              <input type="file" name="image" class="form-control" accept="image/*">

              @if (isset($news) && $news->image)
                <img src="{{ asset('storage/' . $news->image) }}" ...>
              @endif
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Thumbnail <small> (optional) </small> </label>
              <input type="file" name="thumbnail" class="form-control" accept="image/*">

              @if (isset($news) && $news->thumbnail)
                <div class="mt-2">
                  <img src="{{ asset('storage/' . $news->thumbnail) }}" class="img-lg img-thumbnail">
                </div>
              @endif
            </div>

          </div>

        </div>
        @include('theme.coreui.components._metas', ['model' => $news, 'grid' => 'col-md-12'])
      </div>

    </div>
  </form>
@endsection
