<?php

namespace App\Http\Api\Team\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
|--------------------------------------------------------------------------
| Invite Member Request
|--------------------------------------------------------------------------
|
| This class is a type of form request, in which we check
| and validate the invitations team data from the external source (request).
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class InviteMemberRequest extends FormRequest
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
            'users' => 'required|array|exists:users,id'
        ];
    }
}
