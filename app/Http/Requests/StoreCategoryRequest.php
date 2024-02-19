<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name',
        ];
    }

    // Optional: Custom messages
    public function messages()
    {
        return [
            'name.required' => 'A category name is required.',
            'name.unique' => 'This category name is already taken.',
        ];
    }
}
