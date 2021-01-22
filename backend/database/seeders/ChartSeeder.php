<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
|--------------------------------------------------------------------------
| Chart Seeder
|--------------------------------------------------------------------------
|
| This class is a type of database seeder, which includes
| the ability to seed our charts data in database.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws JsonException
     */
    public function run()
    {
        $json = File::get('database/data/charts.json');

        $charts = json_decode($json);

        foreach ($charts as $chart)
        {
            DB::table('charts')->insert([
                'name' => $chart->name,
                'description' => $chart->description,
                'tag' => $chart->tag,
                'data_link' => $chart->data_link,
                'image_link' => $chart->image_link,
            ]);
        }
    }
}
