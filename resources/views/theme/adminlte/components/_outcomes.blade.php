<div id="outcomeAccordion" class="row">
    <div class="{{ $grid ?? 'col-md-12 col-12' }}">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Outcomes</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Outcomes Image</label>
                            <input type="file" name="outcomes_image" class="form-control" accept="image/*">
                            @if ($course->outcomes_image)
                                <div class="mt-1">
                                    <img src="{{ asset('storage/' . $course->outcomes_image) }}"
                                        style="width:100px; height:40px; object-fit:cover;">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="outcome-items">
                    {{-- Existing Outcomes --}}
                    @foreach ($model?->outcomes ?? [] as $index => $outcome)
                        <div class="outcome-item mb-3 p-3 border rounded">
                            <button type="button" class="btn btn-sm btn-danger remove-outcome float-end">
                                <i class="fas fa-times"></i>
                            </button>
                            <input type="hidden" name="outcomes[{{ $index }}][id]"
                                value="{{ $outcome->id ?? '' }}">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="outcomes[{{ $index }}][title]" class="form-control"
                                    value="{{ $outcome->title ?? '' }}" required>
                            </div>

                            {{-- Uncomment this block when you want description --}}
                            {{--
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="outcomes[{{ $index }}][description]"
                                          class="form-control tinymce-editor" rows="3">
                                    {{ $outcome->description ?? '' }}
                                </textarea>
                            </div>
                            --}}
                            <input type="hidden" name="outcomes[{{ $index }}][position]"
                                value="{{ $index }}">
                        </div>
                    @endforeach
                </div>

                {{-- Button to add more --}}
                <button type="button" class="btn btn-primary mt-2 add-outcome">
                    <i class="fas fa-plus"></i> Add Outcome
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Hidden Template --}}
<template id="outcome-template">
    <div class="outcome-item mb-3 p-3 border rounded">
        <button type="button" class="btn btn-sm btn-danger remove-outcome float-end">
            <i class="fas fa-times"></i>
        </button>

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="outcomes[__INDEX__][title]" class="form-control" required>
        </div>

        {{-- Uncomment when description is needed --}}
        {{--
        <div class="form-group">
            <label>Description</label>
            <textarea name="outcomes[__INDEX__][description]"
                      class="form-control tinymce-editor" rows="3"></textarea>
        </div>
        --}}
        <input type="hidden" name="outcomes[__INDEX__][position]" value="__INDEX__">
    </div>
</template>
@push('scripts')
    <script>
        let outcomeIndex = $(".outcome-items .outcome-item").length;

        $(document).ready(function() {
            // Add new Outcome
            $(document).on("click", ".add-outcome", function() {
                let template = $("#outcome-template").html();
                template = template.replace(/__INDEX__/g, outcomeIndex);

                let $newItem = $(template);
                $(".outcome-items").append($newItem);

                // If later you enable TinyMCE for description
                // let newSelector = `textarea[name="outcomes[${outcomeIndex}][description]"]`;
                // if (typeof tinymce !== "undefined") tinymce.init({ selector: newSelector });

                outcomeIndex++;
            });

            // Remove Outcome
            $(document).on("click", ".remove-outcome", function() {
                $(this).closest(".outcome-item").remove();
            });
        });
    </script>
@endpush
