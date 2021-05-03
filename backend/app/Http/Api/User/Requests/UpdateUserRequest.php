<?php

namespace App\Http\Api\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Update Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the updated auth data from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UpdateUserRequest extends FormRequest
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
            'first_name' => 'sometimes|alpha|max:50',
            'middle_name' => 'sometimes|alpha|max:50',
            'last_name' => 'sometimes|alpha|max:50',
            'email' => 'sometimes|email|unique:users',
            'password' => 'sometimes',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'sometimes|max:255',
            'city' => 'sometimes|max:255',
            'country' => 'sometimes|max:255'
        ];
    }
}
