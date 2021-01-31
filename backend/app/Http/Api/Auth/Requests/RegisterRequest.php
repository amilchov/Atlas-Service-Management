<?php

namespace App\Http\Api\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Register Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in whose we check
| and validate the register auth data from the external source.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
