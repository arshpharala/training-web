@extends('theme.adminlte.layouts.app')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Topics</h1>
    </div>
    <div class="col-sm-6">
        <a href="{{ route('admin.catalog.topics.create') }}" class="btn btn-primary float-sm-right">Create Topic</a>
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
                                <th>Topic</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Position</th>
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
    $(function () {
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.catalog.topics.index') }}',
            columns: [
                { data: 'topic_name', name: 'topic_translations.name' },
                { data: 'category_name', name: 'category_translations.name' },
                { data: 'slug', name: 'topics.slug' },
                { data: 'position', name: 'topics.position' },
                { data: 'created_at', name: 'topics.created_at' },
                { data: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
