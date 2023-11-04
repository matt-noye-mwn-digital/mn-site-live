<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageStoreRequest extends FormRequest
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
            'page_title' => ['required', 'string', 'max:255', 'unique:pages'],
            'page_slug' => ['nullable', 'unique:pages'],
            'published' => ['required', 'boolean'],
            'page_template' => ['nullable', 'string', 'max:500'],



            'backend_section_title' => ['required', 'string', 'max:500'],
            'section_display_order' => ['required', 'integer'],
            'section_template' => ['nullable', 'string', 'max:500'],
            'section_content' => ['required'],
            'section_featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
            'use_featured_image_in_section' => ['nullable', 'boolean'],

            'seo_title' => ['nullable', 'string', 'max:500'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'seo_keyword' => ['nullable', 'string', 'max:500'],
            'seo_keywords' => ['nullable'],
            'seo_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
        ];
    }
}
