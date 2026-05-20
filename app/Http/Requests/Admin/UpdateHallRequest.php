<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->mergeIfMissing([
            'is_active' => 0
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:halls,name,' . $this->route('hall')->id
            ],
            'price_weekend' => 'required|integer|min:0',
            'price_weekday' => 'required|integer|min:0',
            'is_active' => 'required|integer|in:0,1',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp|max:2048'],
        ];
    }
}
