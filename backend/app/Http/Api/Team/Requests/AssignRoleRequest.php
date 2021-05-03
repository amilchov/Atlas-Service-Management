<?php

namespace App\Http\Api\Team\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Assign Role Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the added roles to the team from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AssignRoleRequest extends FormRequest
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
            'roles' => 'required|array|exists:roles,id'
        ];
    }
}
