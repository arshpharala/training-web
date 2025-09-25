@extends('theme.coreui.layouts.app')
@section('breadcrumb')
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">CMS</li>
  <li class="breadcrumb-item active">News</li>
@endsection
@section('content-header')
  <div class="row mb-3">
    <div class="col">
      <h1 class="h3 mb-0">@lang('crud.list_title', ['name' => 'News'])</h1>
    </div>
    <div class="col d-flex justify-content-end gap-2">
      <a href="{{ route('admin.cms.news.create') }}" class="btn btn-dark">
        <svg class="icon me-1">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
        </svg>
        @lang('crud.create')
      </a>
    </div>
  </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Is Active</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.cms.news.index') }}',
                columns: [
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'news_translations.title'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });


        });
    </script>
@endpush
