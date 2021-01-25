<?php

namespace App\Http\Api\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Login Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in whose we check
| and validate the login auth data from the external source.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
