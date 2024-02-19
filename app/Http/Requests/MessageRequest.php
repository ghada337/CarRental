<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allows all users to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'message' => 'required|string|min:4|max:2000',
        ];
    }

    /**
     * Custom message for validation
     */
    public function messages()
    {
        return [
            'firstname.required' => 'Please enter your first name.',
            'firstname.string' => 'The first name must be a string.',
            'lastname.required' => 'Please enter your last name.',
            'lastname.string' => 'The last name must be a string.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'message.required' => 'Please enter your message.',
            'message.string' => 'The message must be a string.',
            'message.min' => 'The message is too short.',
        ];
    }
}
