<?php

namespace App\Http\Api\Permission\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Assign Permission Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the assigned permission data from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AssignPermissionRequest extends FormRequest
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
            'role_id' => 'required|integer',
            'permissions' => 'required|exists:permissions,id'
        ];
    }
}
