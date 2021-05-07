<?php

namespace App\Http\Api\Permission\Seeders;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
|--------------------------------------------------------------------------
| Permission Seeder
|--------------------------------------------------------------------------
|
| This class is a type of database seeder, which includes
| the ability to seed our permissions data in database.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws FileNotFoundException
     */
    public function run(): void
    {
        $json = File::get('database/data/permissions.json');

        $permissions = json_decode($json);

        foreach ($permissions as $permission)
        {
            Permission::insert([
                'name' => $permission->name,
                'description' => $permission->description,
                'guard_name' => $permission->guard_name,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
