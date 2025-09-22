<div id="syllabusAccordion" class="row">
    <div class="{{ $grid ?? 'col-md-12 col-12' }}">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Syllabus</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Syllabus Image</label>
                            <input type="file" name="syllabus_image" class="form-control" accept="image/*">
                            @if ($course->syllabus_image)
                                <div class="mt-1">
                                    <img src="{{ asset('storage/' . $course->syllabus_image) }}"
                                        style="width:100px; height:40px; object-fit:cover;">
                                </div>
                            @endif
                        </div>
                    </div>
                </div> --}}

                <div class="syllabus-items">
                    {{-- Existing syllabi --}}
                    @foreach ($model?->syllabi ?? [] as $index => $syllabus)
                        <div class="syllabus-item mb-3 p-3 border rounded">
                            <button type="button" class="btn btn-sm btn-danger remove-syllabus float-end">
                                <i class="fas fa-times"></i>
                            </button>
                            <input type="hidden" name="syllabi[{{ $index }}][id]"
                                value="{{ $syllabus->id ?? '' }}">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="syllabi[{{ $index }}][title]" class="form-control"
                                    value="{{ $syllabus->title ?? '' }}" required>
                            </div>

                            {{-- Uncomment when description is needed --}}

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="syllabi[{{ $index }}][description]" class="form-control tinymce-editor" rows="3">
                                    {{ $syllabus->description ?? '' }}
                                </textarea>
                            </div>

                            <input type="hidden" name="syllabi[{{ $index }}][position]"
                                value="{{ $index }}">
                        </div>
                    @endforeach
                </div>

                {{-- Button to add more --}}
                <button type="button" class="btn btn-primary mt-2 add-syllabus">
                    <i class="fas fa-plus"></i> Add Syllabus
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Hidden Template --}}
<template id="syllabus-template">
    <div class="syllabus-item mb-3 p-3 border rounded">
        <button type="button" class="btn btn-sm btn-danger remove-syllabus float-end">
            <i class="fas fa-times"></i>
        </button>

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="syllabi[__INDEX__][title]" class="form-control" required>
        </div>

        {{-- Uncomment when description is needed --}}

        <div class="form-group">
            <label>Description</label>
            <textarea name="syllabi[__INDEX__][description]" class="form-control tinymce-editor" rows="3"></textarea>
        </div>

        <input type="hidden" name="syllabi[__INDEX__][position]" value="__INDEX__">
    </div>
</template>

@push('scripts')
    <script>
        let syllabusIndex = $(".syllabus-items .syllabus-item").length;

        $(document).ready(function() {
            // Add new syllabus
            $(document).on("click", ".add-syllabus", function() {
                let template = $("#syllabus-template").html();
                template = template.replace(/__INDEX__/g, syllabusIndex);

                let $newItem = $(template);
                $(".syllabus-items").append($newItem);

                // Enable TinyMCE later if needed
                let newSelector = `textarea[name="syllabi[${syllabusIndex}][description]"]`;
                if (typeof tinymce !== "undefined") tinymce.init({
                    selector: newSelector
                });

                syllabusIndex++;
            });

            // Remove syllabus
            $(document).on("click", ".remove-syllabus", function() {
                $(this).closest(".syllabus-item").remove();
            });
        });
    </script>
@endpush
