<?php

namespace App\Http\Requests\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:post_categories'],
            'description' => ['nullable', 'max:10000'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg']
        ];
    }
}
