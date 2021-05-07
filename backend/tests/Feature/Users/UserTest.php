<?php

namespace Tests\Feature\Users;

use App\Http\Api\User\Models\User;
use Exception;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class UserTest extends TestCase
{
    /**
     * Check if all users could be obtained.
     *
     * @return void
     */
    public function test_can_obtain_all_users(): void
    {
        $this->json('GET', 'api/users', [], [
            'Accept' => 'application/json',
            'Application' => config('app.api_key')
        ])->assertStatus(RESPONSE::HTTP_OK);
    }

    /**
     * Check if single user could be obtained.
     *
     * @return void
     * @throws Exception
     */
    public function test_can_obtain_single_user(): void
    {
        $user = random_int(1, 4);

        $this->json('GET', 'api/users/' . $user, [], [
            'Accept' => 'application/json',
            'Application' => config('app.api_key')
        ])->assertStatus(RESPONSE::HTTP_OK);
    }

    /**
     * Check if user can update own data.
     *
     * @return void
     * @throws Exception
     */
    public function test_can_user_update(): void
    {
        $random_user = random_int(1, 4);

        $user = User::findOrFail($random_user);

        $this->json('POST', 'api/users/update', [], [
            'Accept' => 'application/json',
            'Application' => config('app.api_key'),
            'Authorization' => $user->token
        ])->assertStatus(RESPONSE::HTTP_OK);

        $user = User::where('token', $user->token)->firstOrFail();

        $user->update([
            'city' => 'Pernik',
            'country' => 'Bulgaria'
        ]);
    }
}
