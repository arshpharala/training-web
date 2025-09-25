<div class="col-md-12">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Exams</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($exams as $exam)
                        @php
                            $selected = $model?->exams?->pluck('id')?->contains($exam->id);
                        @endphp
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="exams[]" value="{{ $exam->id }}"
                                id="exam_{{ $exam->id }}" @if ($selected) checked @endif>
                            <label class="form-check-label" for="exam_{{ $exam->id }}">
                                {{ $exam->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
