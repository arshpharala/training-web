<form action="{{ route('admin.cms.statistics.update', $statistic) }}" method="post"
  class="ajax-form d-flex flex-column h-100" enctype="multipart/form-data" onsubmit="handleFormSubmission(this)">
  @csrf
  @method('PUT')
  @include('theme.coreui.components._aside-header', [
      'moduleName' => __('crud.edit_title', ['name' => 'Statistic']),
  ])

  <!-- Scrollable Content -->
  <div class="tab-content flex-grow-1 overflow-auto">
    <div class="tab-pane active p-3" id="timeline" role="tabpanel">


      <div class="row">
        <div class="col-md-12">
          @foreach (active_locals() as $locale)
            @php
              $translation = $statistic?->translations->where('locale', $locale)->first() ?? null;
            @endphp

            <div class="form-group mb-3">
              <label class="form-label">Name ({{ strtoupper($locale) }})</label>
              <input type="text" name="name[{{ $locale }}]" value="{{ $translation->name }}"
                class="form-control" required>
            </div>
          @endforeach
          <div class="form-group mb-3">
            <label class="form-label">Number</label>
            <input type="number" name="number" class="form-control" value="{{ $statistic->number }}" required>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-control">
              <option value="1" @if ($statistic->is_active ?? 1) selected @endif>Active</option>
              <option value="0" @if (isset($statistic) && !$statistic->is_active) selected @endif>Inactive</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Icon</label>
            <input type="file" name="icon" class="form-control" accept="image/*">
            @if (isset($statistic) && $statistic->icon)
              <div class="mt-2">
                <img src="{{ asset('storage/' . $statistic->icon) }}" class="img-lg img-thumbnail">
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

