<?php

use Illuminate\Database\Seeder;
use App\Spp;

class SppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = New Spp;
    	$data->period = "2019/2020";
    	$data->amount = 150000;
    	$data->info = "Normal";
    	$data->save();
    }
}
