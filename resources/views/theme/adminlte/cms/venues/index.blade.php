@extends('theme.adminlte.layouts.app')
@section('headerLinks')
    <title>Venues</title>
@endsection
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Venues Page</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.venues.create') }}" class="btn btn-primary float-sm-right">Create
                Venue</a>
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
                                <th>Venue Name</th>
                                <th>Country Name</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="sortable"></tbody>
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
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                ajax: "{{ route('admin.cms.venues.index') }}",
                columns: [
                    {
                        data: 'name',
                        name: 'venues.name' // ✅ Real column name
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
            $("#sortable").sortable({

                stop: function(event, ui) {

                    var itemOrder = $('#sortable').sortable("toArray");
                    var selectedLength = $('#example1').DataTable().page.len();
                    if (selectedLength !== -1) {
                        alert("Please select 'All' option from entries for sorting");
                        return false;
                    }
                    $.ajax({
                        url: "{{ route('admin.cms.sortRows') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: {
                            order: itemOrder,
                            table: "venues"
                        },
                        success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: response.message || "Sorted Successfully.",
                            timer: 2000,
                            showConfirmButton: false,
                        }).then(() => {
                            $('#example1').DataTable();
                        });
                        },
                        error: function() {
                            alert("Something went wrong");
                        },
                    })

                }
            });
        });
    </script>
@endpush
