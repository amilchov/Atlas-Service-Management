<?php

namespace App\Http\Api\User\Seeders;

use App\Http\Api\Role\Constants\Roles;
use App\Http\Api\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
|--------------------------------------------------------------------------
| User Seeder
|--------------------------------------------------------------------------
|
| This class is a type of database seeder, which includes
| the ability to seed our users data in database.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $userClass = User::class;

        $administrator = User::create([
            'first_name' => 'Admin',
            'middle_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'asmadminpassword',
            'avatar' => User::DEFAULT_PICTURE,
            'token' => 'ZMR9NXavD9tTYHvr4PPVIACuWxjvezPzpn0GryMYzI7wCB43d4s3gNu5gyic8oB12hxZZ7ZzSpbHnfKTdA4NoUZ4WgUUbj5Oqy7t1kk29E2fU44gxTxW5NYwP4rg7Z7gkUawbaNb6MDM98Vdp104v68z9H7P19gFkts63i3iia82rffzeDx2345SuzWCcMeXdiJmbXRxDUByGZObK2C43az5rzlpabOyhH50tsAhEH6FFavSa0QVLQCdyIMMsDe',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $administrator->assignRole()->create([
            'role_id' => Roles::ADMIN_ROLE,
            'model_type' => $userClass,
            'model_id' => $administrator->id,
            'model_from' => $userClass
        ]);

        $ess = User::create([
            'first_name' => 'Employee',
            'middle_name' => 'Self',
            'last_name' => 'Service',
            'email' => 'ess@ess.com',
            'password' => 'asmesspassword',
            'avatar' => User::DEFAULT_PICTURE,
            'token' => Str::random(255),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ess->assignRole()->create([
            'role_id' => Roles::EMPLOYEE_SELF_SERVICE_ROLE,
            'model_type' => $userClass,
            'model_id' => $ess->id,
            'model_from' => $userClass
        ]);

        $manager_chart = User::create([
            'first_name' => 'Manager',
            'middle_name' => 'Chart',
            'last_name' => 'Chart',
            'email' => 'managerchart@managerchart.com',
            'password' => 'asmmanagerchartpassword',
            'avatar' => User::DEFAULT_PICTURE,
            'token' => Str::random(255),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $manager_chart->assignRole()->create([
            'role_id' => Roles::MANAGER_CHART_ROLE,
            'model_type' => $userClass,
            'model_id' => $manager_chart->id,
            'model_from' => $userClass
        ]);

        $manager_table = User::create([
            'first_name' => 'Manager',
            'middle_name' => 'Table',
            'last_name' => 'Table',
            'email' => 'managertable@managertable.com',
            'password' => 'asmmanagertablepassword',
            'avatar' => User::DEFAULT_PICTURE,
            'token' => Str::random(255),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $manager_table->assignRole()->create([
            'role_id' => Roles::MANAGER_TABLE_ROLE,
            'model_type' => $userClass,
            'model_id' => $manager_table->id,
            'model_from' => $userClass
        ]);
    }
}
