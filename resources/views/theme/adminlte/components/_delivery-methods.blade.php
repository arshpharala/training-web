<div class="col-md-12">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Delivery Method</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($deliveryMethods as $method)
                        @php
                            $selected = $model?->deliveryMethods?->pluck('id')?->contains($method->id);
                        @endphp
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="delivery_methods[]"
                                value="{{ $method->id }}" id="delivery_method_{{ $method->id }}"
                                @if ($selected) checked @endif>
                            <label class="form-check-label" for="delivery_method_{{ $method->id }}">
                                {{ $method->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
