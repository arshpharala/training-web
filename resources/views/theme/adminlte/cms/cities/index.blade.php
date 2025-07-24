@extends('theme.adminlte.layouts.app')
@section('headerLinks')
    <title>Cities</title>
@endsection
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Cities Page</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.cities.create') }}" class="btn btn-primary float-sm-right">Create
                City</a>
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
                                    <th>City Name</th>
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
                ajax: "{{ route('admin.cms.cities.index') }}",
                columns: [
                    {
                        data: 'name',
                        name: 'cities.name',
                    },
                    {
                        data: 'state_name',
                        name: 'states.name',
                        orderable: false,
                        searchable: false // ✅ Real column name
                    },
                    {
                        data: 'country_name',
                        name: 'countries.name',
                        orderable: false,
                        searchable: false // ✅ Real column name
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
            // ✅ Debounce logic
        var searchDelay;
        $('#example1_filter input') // targets the search input
            .unbind() // remove default binding
            .on('input', function () {
                clearTimeout(searchDelay);
                var value = this.value;

                searchDelay = setTimeout(function () {
                    table.search(value).draw();
                }, 400); // 1000ms = 1 second
            });
        });
    </script>
@endpush
