@extends('theme.coreui.layouts.app')
@section('breadcrumb')
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">CMS</li>
  <li class="breadcrumb-item active">Testimonial</li>
@endsection
@section('content-header')
  <x-coreui::content-header type="list" name="Testimonial" :createRoute="route('admin.cms.testimonials.create')" />
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
                  <th>Image</th>
                  <th>Name</th>
                  <th>Rating</th>
                  <th>Is Active</th>
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
        ajax: '{{ route('admin.cms.testimonials.index') }}',
        columns: [{
            data: 'image',
            name: 'image',
            orderable: false,
            searchable: false
          },
          {
            data: 'name',
            name: 'testimonial_translations.name'
          },
          {
            data: 'rating',
            name: 'rating'
          },
          {
            data: 'is_active',
            name: 'is_active'
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
