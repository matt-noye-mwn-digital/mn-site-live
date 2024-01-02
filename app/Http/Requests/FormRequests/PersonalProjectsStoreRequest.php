<?php

namespace App\Http\Requests\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalProjectsStoreRequest extends FormRequest
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
            'tagline' => ['nullable', 'string', 'max:255'],
            'featured_image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,svg'],
            'services_used' => ['required'],
            'the_brief' => ['nullable', 'max:10000'],
            'project_link' => ['nullable', 'url', 'max:255'],
            'responsive_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg'],

        ];
    }
}
