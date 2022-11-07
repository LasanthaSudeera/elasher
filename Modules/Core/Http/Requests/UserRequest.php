<?php

namespace Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['nullable', 'string'],
            'username' => ['required', Rule::unique('users', 'username')->ignore($this->get('id'))],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->get('id'))],
            'password' => ['nullable', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'old_password' => ['nullable','required_with:password', 'current_password']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'old_password.required_with' => 'The old password field is required when you change your password.',
        ];
    }
}
