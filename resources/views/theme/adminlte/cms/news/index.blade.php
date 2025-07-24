@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">News</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.cms.news.create') }}" class="btn btn-primary float-sm-right">Create
                News</a>
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
                                    <th>News Title</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
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
        $(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.cms.news.index') }}',
                columns: [
                    //   {
                    //     data: 'id',
                    //     name: 'id'
                    //   },
                    {
                        data: 'title',
                        name: 'translations.title',
                    },
                    {
                        data: 'category_name',
                        name: 'category_translations.name'
                    },
                    {
                        data: 'slug',
                        name: 'news.slug'
                    },
                    {
                        data: 'created_at',
                        name: 'news.created_at'
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
