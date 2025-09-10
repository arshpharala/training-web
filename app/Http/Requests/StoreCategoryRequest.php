<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        $locales = active_locals();
        $rules = [
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug'],
            'position' => ['nullable', 'integer'],
            'is_active' => ['nullable'],
            'is_featured' => ['nullable'],
            'blog_only' => ['nullable'],
            'icon' => ['nullable', 'image', 'max:1024'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'banner' => ['nullable', 'image', 'max:4096'],
            'color' => ['nullable', 'string', 'max:7'],
            'name' => ['required', 'array'],
        ];
        foreach ($locales as $locale) {
            $rules["name.$locale"] = ['required', 'string', "max:255"];
            $rules["short_description.$locale"] = ['nullable', 'string'];
            $rules["content.$locale"] = ['nullable', 'string'];
        }
        return $rules;
    }
}
