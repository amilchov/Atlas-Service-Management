<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
