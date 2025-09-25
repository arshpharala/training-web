<form action="{{ route('admin.cms.partners.update', $partner->id) }}" method="post" class="ajax-form d-flex flex-column h-100"
  enctype="multipart/form-data" onsubmit="handleFormSubmission(this)">
  @csrf
  @method('PUT')
  @include('theme.coreui.components._aside-header', [
      'moduleName' => __('crud.edit_title', ['name' => 'Partner']),
  ])

  <!-- Scrollable Content -->
  <div class="flex-fill" style="overflow-y:auto; min-height:0; max-height:calc(100vh - 132px);">
    <div class="p-3" id="aside-inner-content">

      <div class="row">
        <div class="col-md-12">
          <div class="form-group mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $partner->name ?? '') }}"
              required>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $partner->slug ?? '') }}"
              required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-control">
              <option value="1" @if (old('is_active', $partner->is_active ?? 1)) selected @endif>Active</option>
              <option value="0" @if (isset($partner) && !$partner->is_active) selected @endif>Inactive</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Position</label>
            <input type="number" name="position" class="form-control"
              value="{{ old('position', $partner->position ?? 0) }}">
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Logo</label>

            <input type="file" name="logo" class="form-control" accept="image/*">

            @if (isset($partner) && $partner->logo)
              <div class="mt-2">
                <img src="{{ asset('storage/' . $partner->logo) }}" class="img-lg img-thumbnail">
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

