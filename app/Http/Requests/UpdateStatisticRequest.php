<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatisticRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'number'            => 'required|numeric|min:0',
            'is_active'         => 'boolean',
            'icon'              => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ];

        foreach (active_locals() as $locale) {
            $rules["name.$locale"] = 'required|string|max:255';
        }

        return $rules;
    }
}
