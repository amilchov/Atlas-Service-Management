<?php

namespace App\Http\Api\Role\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Assign Role Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the assigned role data from the external source (request).
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
            'user_id' => 'required|integer|exists:users,id',
            'roles' => 'required|array|exists:roles,id'
        ];
    }
}
