<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
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
        $id = request()->id ?? 0;

        return [
            'state_id' => 'required|integer|exists:states,id',
            'name' => [
                'required',
                Rule::unique('cities')
                    ->where(function ($query) {
                        return $query->where('state_id', request()->state_id);
                    })
                    ->ignore($id),
            ]
        ];
    }
}
