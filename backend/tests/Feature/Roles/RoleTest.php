<?php

namespace Tests\Feature\Roles;

use Exception;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class RoleTest extends TestCase
{
    /**
     * Check if all roles could be obtained.
     *
     * @return void
     */
    public function test_can_obtain_all_roles(): void
    {
        $this->json('GET', 'api/roles', [], [
            'Accept' => 'application/json',
            'Application' => config('app.api_key')
        ])->assertStatus(RESPONSE::HTTP_OK);
    }

    /**
     * Check if single role could be obtained.
     *
     * @return void
     * @throws Exception
     */
    public function test_can_obtain_single_role(): void
    {
        $role = random_int(1, 32);

        $this->json('GET', 'api/roles/' . $role, [], [
            'Accept' => 'application/json',
            'Application' => config('app.api_key')
        ])->assertStatus(RESPONSE::HTTP_OK);
    }
}
