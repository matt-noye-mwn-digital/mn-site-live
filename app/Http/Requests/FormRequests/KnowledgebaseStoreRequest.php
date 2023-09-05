<?php

namespace App\Http\Requests\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class KnowledgebaseStoreRequest extends FormRequest
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
            'slug' => ['nullable', 'max:255'],
            'main_content' => ['required', 'max:20000'],
            'excerpt' => ['max:300'],
            'published' => ['nullable', 'boolean'],
            'page_type' => ['nullable', 'string'],
            'page_description' => ['nullable', 'max:300'],
            'page_keywords' => ['nullable', 'max:300'],
            'category_id' => ['nullable', 'integer']
        ];
    }
}
