<?php

namespace App\Http\Api\Team\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Store Team Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the assigned team data from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class StoreTeamRequest extends FormRequest
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
            'name' => 'required|string|max:50|unique:teams',
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roles' => 'sometimes|array|exists:roles,id'
        ];
    }
}
