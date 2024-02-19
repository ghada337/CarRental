<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:50',
            'content' => 'required|string',
            'position' => 'required|string|max:50',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'The name of the testimonial is required.',
        'name.string' => 'The name must be a string.',
        'name.max' => 'The name may not be greater than 50 characters.',
        'position.required' => 'The position of the testimonial is required.',
        'position.string' => 'The position must be a string.',
        'position.max' => 'The position may not be greater than 50 characters.',
        'content.required' => 'The content description is required.',
        'content.string' => 'The content must be a string.',
        'content.max' => 'The content may not be greater than 1000 characters.',
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
        'image.max' => 'The image may not be greater than 2048 kilobytes.',
    ];
}

}
