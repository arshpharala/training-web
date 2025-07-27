@extends('theme.adminlte.layouts.app')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Courses</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('admin.catalog.courses.create') }}" class="btn btn-primary float-sm-right">Create
                Course</a>
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
                                    <th>Course</th>
                                    <th>Category</th>
                                    <th>Duration</th>
                                    <th>Slug</th>
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
                ajax: '{{ route('admin.catalog.courses.index') }}',
                columns: [
                    //   {
                    //     data: 'id',
                    //     name: 'id'
                    //   },
                    {
                        data: 'name',
                        name: 'course_translations.name',
                    },
                    {
                        data: 'category_name',
                        name: 'category_translations.name'
                    },
                    {
                        data: 'duration',
                        name: 'courses.duration'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
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

            $('#select-all').on('click', function() {
                $('.row-checkbox').prop('checked', this.checked);
            });

            $('#bulk-delete').on('click', function() {
                let ids = $('.row-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();
                if (ids.length === 0) return alert('No categories selected!');
                if (!confirm('Delete selected categories?')) return;
                $.post("{{ route('admin.catalog.categories.bulk-delete') }}", {
                    ids,
                    _token: "{{ csrf_token() }}"
                }, function(resp) {
                    $('.data-table').DataTable().ajax.reload();
                    alert(resp.message);
                });
            });

            $('#bulk-restore').on('click', function() {
                let ids = $('.row-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();
                if (ids.length === 0) return alert('No categories selected!');
                $.post("{{ route('admin.catalog.categories.bulk-restore') }}", {
                    ids,
                    _token: "{{ csrf_token() }}"
                }, function(resp) {
                    $('.data-table').DataTable().ajax.reload();
                    alert(resp.message);
                });
            });
        });
    </script>
@endpush
