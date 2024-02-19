<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'title' => 'required|string|max:50|unique:cars,title',
            'content' => 'required|string',
            'luggage' => 'required|string|max:10',
            'doors' => 'required|string|max:10',
            'passengers' => 'required|string|max:10',
            'price' => 'required|string|max:10',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'The title of the car is required.',
        'title.string' => 'The title must be a string.',
        'title.max' => 'The title may not be greater than 50 characters.',
        'title.unique' => 'The title has already been taken. Please choose another.',
        'content.required' => 'The content description is required.',
        'content.string' => 'The content must be a string.',
        'content.max' => 'The content may not be greater than 1000 characters.',
        'luggage.required' => 'The luggage capacity is required.',
        'luggage.numeric' => 'The luggage capacity must be a number.',
        'luggage.min' => 'The luggage capacity must be at least 1.',
        'doors.required' => 'The number of doors is required.',
        'doors.numeric' => 'The doors field must be a number.',
        'doors.min' => 'The number of doors must be at least 1.',
        'passengers.required' => 'The number of passengers is required.',
        'passengers.numeric' => 'The passengers field must be a number.',
        'passengers.min' => 'The number of passengers must be at least 1.',
        'price.required' => 'The price is required.',
        'price.numeric' => 'The price must be a number.',
        'price.min' => 'The price must be at least 0.',
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
        'image.max' => 'The image may not be greater than 2048 kilobytes.',
        'category_id.required' => 'The category is required.',
        'category_id.exists' => 'The selected category is invalid.',
    ];
}

}
