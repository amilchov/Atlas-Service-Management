<?php

namespace App\Http\Api\Chart\Seeders;

use App\Http\Api\Chart\Models\Chart;
use Illuminate\Database\Seeder;
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
     */
    public function run(): void
    {
        $json = File::get('database/data/charts.json');

        $charts = json_decode($json);

        foreach ($charts as $chart)
        {
            Chart::insert([
                'name' => $chart->name,
                'description' => $chart->description,
                'tag' => $chart->tag,
                'data_link' => $chart->data_link,
                'grafana_link' => $chart->grafana_link,
                'image_link' => $chart->image_link,
                'value_type' => $chart->value_type
            ]);
        }
    }
}
