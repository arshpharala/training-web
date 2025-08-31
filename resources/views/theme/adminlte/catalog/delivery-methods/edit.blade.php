<form action="{{ route('admin.catalog.delivery-methods.update', $deliveryMethod->id) }}" method="post" class="ajax-form"
      enctype="multipart/form-data" onsubmit="handleFormSubmission(this)">
  @csrf
  @method('PUT')

  @include('theme.adminlte.components._aside-header', [
      'moduleName' => __('crud.edit_title', ['name' => 'Delivery Method']),
  ])

  <!-- Scrollable Content -->
  <div class="flex-fill" style="overflow-y:auto; min-height:0; max-height:calc(100vh - 132px);">
    <div class="p-3" id="aside-inner-content">

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $deliveryMethod->name) }}" required>
          </div>

          <div class="form-group">
            <label>Short Description</label>
            <input type="text" name="shot_description" class="form-control" value="{{ old('shot_description', $deliveryMethod->shot_description) }}" required>
          </div>

          <div class="form-group">
            <label>Status</label>
            <select name="is_active" class="form-control">
              <option value="1" {{ old('is_active', $deliveryMethod->is_active) ? 'selected' : '' }}>Active</option>
              <option value="0" {{ old('is_active', $deliveryMethod->is_active) ? '' : 'selected' }}>Inactive</option>
            </select>
          </div>

          <div class="form-group">
            <label>Position</label>
            <input type="number" name="position" class="form-control" value="{{ old('position', $deliveryMethod->position) }}">
          </div>

          <div class="form-group">
            <label>Icon</label>
            <input type="file" name="icon" class="form-control" accept="image/*">
            @if ($deliveryMethod->icon)
              <div class="mt-2">
                <img src="{{ asset('storage/' . $deliveryMethod->icon) }}" class="img-lg img-thumbnail">
              </div>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Fixed Buttons -->
  @include('theme.adminlte.components._aside-footer')

</form>

<script>
  $(document).ready(function() {
    $("form.ajax-form").each(function() {
      handleFormSubmission(this);
    });
  });
</script>

