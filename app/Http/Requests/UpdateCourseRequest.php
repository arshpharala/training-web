<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
        $id = $this->route('course');
        $locales = active_locals();
        $rules = [
            'topic_id' => ['required', 'exists:topics,id'],
            'slug' => ['required', 'string', 'max:255', "unique:courses,slug,$id"],
            'position' => ['nullable', 'integer'],
            'is_active' => ['nullable'],
            'is_featured' => ['nullable'],
            'is_latest' => ['nullable'],
            'is_popular' => ['nullable'],
            'is_trending' => ['nullable'],
            'video_url' => ['nullable'],
            'exam_included' => ['nullable'],
            'duration' =>  ['required', 'integer'],
            'icon' => ['nullable', 'image', 'max:1024'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'banner' => ['nullable', 'image', 'max:4096'],
            'color' => ['nullable', 'string', 'max:7'],
            'level' => ['nullable', 'integer'],
            'name' => ['required', 'array'],
        ];
        foreach ($locales as $locale) {
            $rules["name.$locale"] = ['required', 'string', "max:255"];
            $rules["short_description.$locale"] = ['nullable', 'string'];
            $rules["overview.$locale"] = ['nullable', 'string'];
            $rules["who_should_attend.$locale"] = ['nullable', 'string'];
            $rules["prerequisites.$locale"] = ['nullable', 'string'];
        }
        return $rules;
    }
}
