@extends('theme.adminlte.layouts.app')
@section('headerLinks')
    <title>States</title>
@endsection
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>States Page</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.states.create') }}" class="btn btn-primary float-sm-right">Create
                State</a>
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
                                    <th>State Name</th>
                                    <th>Country Name</th>
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
                ajax: "{{ route('admin.cms.states.index') }}",
                columns: [
                    {
                        data: 'name',
                        name: 'states.name' // ✅ Real column name
                    },
                    {
                        data: 'country_name',
                        name: 'countries.name' // ✅ Real column name
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });
    </script>
@endpush
