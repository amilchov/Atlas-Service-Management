<?php

namespace App\Http\Api\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Update Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in whose we check
| and validate the updated auth data from the external source.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'sometimes|alpha|max:50',
            'middle_name' => 'sometimes|alpha|max:50',
            'last_name' => 'sometimes|alpha|max:50',
            'email' => 'sometimes|email|unique:users',
            'password' => 'sometimes',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
