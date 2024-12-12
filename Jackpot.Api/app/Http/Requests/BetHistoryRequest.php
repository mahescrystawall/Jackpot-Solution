<?php
namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BetHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Add proper authorization if needed
    }

    public function rules()
    {
        return [
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            // Other validation rules
        ];
    }

    public function getDateRange()
    {
        $postData = $this->all();

        if (!empty($postData['start_date']) && !empty($postData['end_date'])) {
            $startDate = Carbon::parse($postData['start_date']);
            $endDate = Carbon::parse($postData['end_date']);
        } else {
            $postData['event_type_id'] = 4;
            $postData['type'] = 4;
            $startDate = Carbon::now()->subDays(5)->toDateString();
            $endDate = Carbon::now()->toDateString();
            $postData['is_matched'] = 1;
        }

        return compact('startDate', 'endDate', 'postData');
    }
}
