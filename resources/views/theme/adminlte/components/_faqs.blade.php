<div id="faqAccordion" class="row">
    <div class="{{ $grid ?? 'col-md-12 col-12' }}">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">FAQs</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="faq-items">
                    {{-- Existing FAQs --}}
                    @foreach ($model?->faqs ?? [] as $index => $faq)
                        <div class="faq-item mb-3 p-3 border rounded">
                            <button type="button" class="btn btn-sm btn-danger remove-faq float-end">
                                <i class="fas fa-times"></i>
                            </button>

                            <div class="form-group">
                                <label>Question</label>
                                <input type="text" name="faqs[{{ $index }}][question]" class="form-control"
                                       value="{{ old("faqs.$index.question", $faq->question ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label>Answer</label>
                                <textarea name="faqs[{{ $index }}][answer]" class="form-control tinymce-editor" rows="3">
                                    {{ old("faqs.$index.answer", $faq->answer ?? '') }}
                                </textarea>
                            </div>
                            <input type="hidden" name="faqs[{{ $index }}][position]" value="{{ $index }}">
                        </div>
                    @endforeach
                </div>

                {{-- Button to add more --}}
                <button type="button" class="btn btn-primary mt-2 add-faq">
                    <i class="fas fa-plus"></i> Add FAQ
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Hidden Template --}}
<template id="faq-template">
    <div class="faq-item mb-3 p-3 border rounded">
        <button type="button" class="btn btn-sm btn-danger remove-faq float-end">
            <i class="fas fa-times"></i>
        </button>

        <div class="form-group">
            <label>Question</label>
            <input type="text" name="faqs[__INDEX__][question]" class="form-control">
        </div>
        <div class="form-group">
            <label>Answer</label>
            <textarea name="faqs[__INDEX__][answer]" class="form-control tinymce-editor" rows="3"></textarea>
        </div>
        <input type="hidden" name="faqs[__INDEX__][position]" value="__INDEX__">
    </div>
</template>

@push('scripts')
<script>
    let faqIndex = $(".faq-items .faq-item").length;

    function initTinyMCE(selector) {
        if (typeof tinymce !== "undefined") {
            tinymce.init({
                selector: selector,
                height: 200,
                menubar: false,
                plugins: 'link lists code',
                toolbar: 'undo redo | bold italic | bullist numlist | link | code',
            });
        }
    }

    $(document).ready(function () {
        // Add new FAQ
        $(document).on("click", ".add-faq", function () {
            let template = $("#faq-template").html();
            template = template.replace(/__INDEX__/g, faqIndex);

            let $newItem = $(template);
            $(".faq-items").append($newItem);

            // init TinyMCE for new textarea only
            let newSelector = `textarea[name="faqs[${faqIndex}][answer]"]`;
            initTinyMCE(newSelector);

            faqIndex++;
        });

        // Remove FAQ
        $(document).on("click", ".remove-faq", function () {
            let $faq = $(this).closest(".faq-item");

            // Destroy TinyMCE before removing
            let textarea = $faq.find("textarea.tinymc-editor");
            if (textarea.length && tinymce.get(textarea.attr('id'))) {
                tinymce.get(textarea.attr('id')).remove();
            }

            $faq.remove();
        });
    });
</script>
@endpush
