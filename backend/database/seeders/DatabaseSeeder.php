<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Api\Chart\Seeders\ChartSeeder;
use App\Http\Api\Role\Seeders\RoleSeeder;
use App\Http\Api\User\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            ChartSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
