<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClientRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation'=>'required|string|min:8',
            'withdrawal_password' => 'required|string|min:6',
            'referral_code' => 'nullable|string|min:5|max:10',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please enter your first name.',
            'last_name.required' => 'Please enter your last name.',
            'username.required' => 'Please choose a username.',
            'email.required' => 'Please provide a valid email address.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Passwords do not match.',
            'password_confirmation.required'=>'Please enter confirm password',
            'withdrawal_password.required' => 'Withdrawal password is required.',
            'referral_code.min' => 'Referral code must be at least 5 characters long.',
        ];
    }

}
