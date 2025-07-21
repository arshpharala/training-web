@extends('theme.adminlte.layouts.app')
@section('headerLinks')
    <title>Countries</title>
@endsection
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Countries Page</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.countries.create') }}" class="btn btn-primary float-sm-right">Create
                Country</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    {{-- <th>Index</th> --}}
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#example1').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [10, 25, 50],
                    [10, 25, 50]
                ],
                ajax: "{{ route('admin.cms.countries.index') }}",
                columns: [{
                        data: 'name',
                        name: 'Name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
