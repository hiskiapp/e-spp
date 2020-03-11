<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = New Setting;
        $data->slug = "title";
        $data->title = "Judul Website";
        $data->content = "E-SPP";
        $data->save();

        $data = New Setting;
        $data->slug = "month_begin";
        $data->title = "Bulan Dimulai -> 1/7";
        $data->content = "7";
        $data->save();

        $data = New Setting;
        $data->slug = "ovo";
        $data->title = "OVO Number";
        $data->content = "085155064115";
        $data->save();

        $data = New Setting;
        $data->slug = "bri";
        $data->title = "BRI Rek";
        $data->content = "1234567890";
        $data->save();
    }
}
