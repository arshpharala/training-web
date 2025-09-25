@extends('theme.coreui.layouts.app')
@section('breadcrumb')
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">CMS</li>
  <li class="breadcrumb-item active">
    Statistics
  </li>
@endsection
@section('content-header')
  <div class="row mb-3">
    <div class="col">
      <h1 class="h3 mb-0">@lang('crud.list_title', ['name' => 'Statistic'])</h1>
    </div>
    <div class="col d-flex justify-content-end gap-2">
      <button data-url="{{ route('admin.cms.statistics.create') }}" type="button" class="btn btn-dark"
        onclick="getAside()">
        <svg class="icon me-1">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
        </svg>
        @lang('crud.create')
      </button>
    </div>
  </div>
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered data-table">
        <thead>
          <tr>
            {{-- <th>#</th> --}}
            <th>Name</th>
            <th>Number</th>
            <th>Icon</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
@endsection
@push('scripts')
  <script>
    $(function() {
      $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.cms.statistics.index') }}',
        columns: [{
            data: 'name',
            name: 'statistic_translations.name'
          },
          {
            data: 'number',
            name: 'number'
          },
          {
            data: 'icon',
            name: 'icon',
            orderable: false,
            searchable: false
          },
          {
            data: 'is_active',
            name: 'is_active'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
          }
        ]
      });
    });
  </script>
@endpush
