<?php

namespace App\Http\Requests\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'tagline' => ['required', 'max:2000'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,webp,png,svg'],
            'services_used' => ['required'],
            'the_brief' => ['nullable', 'max:10000'],
            'website_link' => ['nullable', 'url', 'max:255'],
            'mobile_desktop_tablet_image' => ['nullable', 'image', 'mimes:jpg,jpeg,webp,png,svg'],
            'testimonial_content' => ['nullable', '10000'],
            'testimonial_author' => ['nullable', 'string', 'max:255'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:300'],
        ];
    }
}
