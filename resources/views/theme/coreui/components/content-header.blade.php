@props([
    'title' => '', // Custom title if needed
    'type' => 'list', // list | create | edit
    'name' => '', // Entity name (e.g., Exam, Partner)
    'createRoute' => null, // route() for create button
    'indexRoute' => null, // route() for back button
    'aside' => false, // true = use aside button (getAside), false = link
])

<div class="row mb-3">
  <div class="col">
    @if ($type === 'list')
      <h1 class="h3 mb-0">@lang('crud.list_title', ['name' => $name])</h1>
    @elseif($type === 'create')
      <h1 class="h3 mb-0">@lang('crud.create_title', ['name' => $name])</h1>
    @elseif($type === 'edit')
      <h1 class="h3 mb-0">@lang('crud.edit_title', ['name' => $name])</h1>
    @else
      <h1 class="h3 mb-0">{{ $title }}</h1>
    @endif
  </div>

  <div class="col d-flex justify-content-end gap-2">
    @if ($type === 'list' && $createRoute)
      @if ($aside)
        <button data-url="{{ $createRoute }}" type="button" class="btn btn-dark" onclick="getAside()">
          <svg class="icon me-1">
            <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
          </svg>
          @lang('crud.create')
        </button>
      @else
        <a href="{{ $createRoute }}" class="btn btn-dark">
          <svg class="icon me-1">
            <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
          </svg>
          @lang('crud.create')
        </a>
      @endif
    @elseif(in_array($type, ['create', 'edit']) && $indexRoute)
      <a href="{{ $indexRoute }}" class="btn btn-dark">
        @lang('crud.back_to_list', ['name' => $name])
      </a>
    @endif

    {{ $slot }}
  </div>
</div>
