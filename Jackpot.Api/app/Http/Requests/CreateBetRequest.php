<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBetRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'type' => 'required|string',
            'event_id' => 'required|integer',
            'event_type_id' => 'required|integer',
            'event_name' => 'required|string',
            'odd' => 'required|numeric',
            'nation' => 'required|string',
            'stake' => 'required|numeric',
            'status_id' => 'required|integer',
            'comm_in' => 'required|numeric',
            'comm_out' => 'required|numeric',
            'potential_payout' => 'required|numeric',
            'is_back' => 'required|boolean',
            'round_id' => 'nullable|string',
            'game_id' => 'nullable|string',
            'game_code' => 'nullable|string',
            'order_id' => 'nullable|string',
            'runner_id' => 'nullable|string',
            'runner_name' => 'nullable|string',
            'created_by' => 'required|numeric',
        ];
    }
}
