<?php

namespace App\Http\Api\Team\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Assign Incident Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the assigned incidents to the team from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AssignIncidentRequest extends FormRequest
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
            'incidents' => 'required|array|exists:incidents,id'
        ];
    }
}
