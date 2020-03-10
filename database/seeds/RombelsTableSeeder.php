<?php

use Illuminate\Database\Seeder;
use App\Rombel;

class RombelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = New Rombel;
        $data->name = "XII RPL";
        $data->major_competency = "Rekayasa Perangkat Lunak";
        $data->save();
    }
}
