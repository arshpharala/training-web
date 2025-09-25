<form action="{{ route('admin.cms.partners.store') }}" method="post" class="ajax-form d-flex flex-column h-100"
  enctype="multipart/form-data" onsubmit="handleFormSubmission(this)">
  @csrf
  @include('theme.coreui.components._aside-header', [
      'moduleName' => __('crud.create_title', ['name' => 'Partner']),
  ])

  <div class="tab-content flex-grow-1 overflow-auto">
    <div class="tab-pane active p-3" id="timeline" role="tabpanel">

      <div class="row">
        <div class="col-md-12">
          <div class="form-group mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-control">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Position</label>
            <input type="number" name="position" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control" accept="image/*">
            @if (isset($brand) && $brand->logo)
              <div class="mt-2">
                <img src="{{ asset('storage/' . $brand->logo) }}" class="img-lg img-thumbnail">
              </div>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Fixed Buttons -->
  @include('theme.coreui.components._aside-footer')

</form>
<script>
  $(document).ready(function() {
    $("form.ajax-form").each(function() {
      handleFormSubmission(this);
    });
  });
</script>
