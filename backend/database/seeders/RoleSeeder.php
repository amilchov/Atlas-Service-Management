<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
|--------------------------------------------------------------------------
| Role Seeder
|--------------------------------------------------------------------------
|
| This class is a type of database seeder, which includes
| the ability to seed our roles data in database.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/roles.json');

        $roles = json_decode($json);

        foreach ($roles as $role)
        {
            DB::table('roles')->insert([
                'name' => $role->name,
                'description' => $role->description,
                'guard_name' => $role->guard_name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
