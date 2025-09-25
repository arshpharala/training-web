@extends('theme.coreui.layouts.app')
@section('breadcrumb')
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">Catalog</li>
  <li class="breadcrumb-item active">Exam</li>
@endsection
@section('content-header')
  <div class="row mb-3">
    <div class="col">
      <h1 class="h3 mb-0">@lang('crud.list_title', ['name' => 'Exam'])</h1>
    </div>
    <div class="col d-flex justify-content-end gap-2">
      <a href="{{ route('admin.catalog.exams.create') }}" class="btn btn-dark">
        <svg class="icon me-1">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
        </svg>
        @lang('crud.create')
      </a>
    </div>
  </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Level</th>
                        <th>Duration</th>
                        <th>Created At</th>
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
                ajax: '{{ route('admin.catalog.exams.index') }}',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'level',
                        name: 'level'
                    },
                    {
                        data: 'duration',
                        name: 'duration'
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
