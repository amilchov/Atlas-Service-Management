<?php

namespace App\Http\Api\Incident\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Store Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the incident data from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class StoreRequest extends FormRequest
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
            'category_id' => 'required|integer|max:50|exists:charts,id',
            'state' => 'required|string|max:50',
            'impact' => 'required|string|max:50',
            'urgency' => 'required|string|max:50',
            'priority' => 'required|string|max:50',
            'short_description' => 'required',
            'description' => 'sometimes|string',
            'executor_id' => 'required|integer|exists:users,id'
        ];
    }
}
