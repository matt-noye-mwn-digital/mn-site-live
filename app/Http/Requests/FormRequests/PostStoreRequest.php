<?php

namespace App\Http\Requests\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'featured_image' => ['nullable'],
            'main_content' => ['required', 'max:20000'],
            'excerpt' => ['nullable', 'max:100'],
            'page_type' => ['nullable', 'string', 'max:255'],
            'page_description' => ['nullable', 'max:300'],
            'page_keywords' => ['nullable', 'max:300'],
            'category_id' => ['required', 'integer'],
            'tag' => ['nullable', 'array'],
            'published' => ['required', 'integer'],
        ];
    }
}
