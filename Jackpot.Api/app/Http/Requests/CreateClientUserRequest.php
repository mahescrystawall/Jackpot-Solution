<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'username' => 'required|string|max:220',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|max:255',
            'password_confirmation' => 'required|string|max:255',
            'withdrawal_password' => 'required|string|max:250',
            'referral_code' => 'nullable|string|max:225',
        ];
    }
}
