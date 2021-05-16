<?php

namespace App\Http\Api\Incident\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Update Incident Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the assigned updated incident data from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UpdateIncidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'category_id' => 'sometimes|integer|max:50|exists:charts,id',
            'state' => 'sometimes|string|max:50',
            'impact' => 'sometimes|string|max:50',
            'urgency' => 'sometimes|string|max:50',
            'priority' => 'sometimes|string|max:50',
            'short_description' => 'sometimes|max:255',
            'description' => 'sometimes',
            'caller_id' => 'sometimes|integer|exists:users,id',
            'executor_id' => 'sometimes|integer|exists:users,id'
        ];
    }
}
