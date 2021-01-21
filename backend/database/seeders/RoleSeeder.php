<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
