<?php

namespace App\Http\Api\Authentication\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Register User Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in whose we check
| and validate the register auth data from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required|alpha|max:50',
            'middle_name' => 'required|alpha|max:50',
            'last_name' => 'required|alpha|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
