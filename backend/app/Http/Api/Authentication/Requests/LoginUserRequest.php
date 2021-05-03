<?php

namespace App\Http\Api\Authentication\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Login User Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the login auth data from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class LoginUserRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
