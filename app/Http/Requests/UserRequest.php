<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only allow logged-in users; adjust as necessary
        return auth()->check();
    }

    public function rules(): array
    {
        $userId = $this->user ? $this->user->id : null;


        return [
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'UserName')->ignore($userId)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'password' => $userId ? ['sometimes', 'string', 'min:8'] : ['required', 'string', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [

            'fullname.required' => 'The full name field is required.',
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email has already been taken.',
            'password.min' => 'The password must be at least 8 characters.',

        ];
    }
}
