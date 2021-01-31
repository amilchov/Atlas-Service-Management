<?php

namespace App\Http\Api\User\Seeders;

use App\Http\Api\Role\Constants\Roles;
use App\Http\Api\Auth\Models\Auth;
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
    public function run()
    {
        $administrator = Auth::create([
            'first_name' => 'Admin',
            'middle_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'asmadminalexdavid',
            'avatar' => Auth::DEFAULT_AVATAR,
            'token' => Str::random(255),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $administrator->assignRole(Roles::ADMIN_ROLE);
    }
}
