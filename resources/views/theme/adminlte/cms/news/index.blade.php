@extends('theme.adminlte.layouts.app')
@section('headerLinks')
    <title>News</title>
@endsection
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>News Page</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.news.create') }}" class="btn btn-primary float-sm-right">Create
                News</a>
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
                                    <th>News Name</th>
                                    <th>Category Name</th>
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
                ajax: "{{ route('admin.cms.news.index') }}",
                columns: [{
                        data: 'title',
                        name: 'news.title' // ✅ Real column name
                    },
                    {
                        data: 'category_name',
                        name: 'categories.slug' // ✅ Real column name
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
