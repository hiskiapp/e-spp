<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = New Admin;
        $data->name = "Hiskia Anggi";
        $data->username = "hiskia";
        $data->email = "hiskianggi@gmail.com";
        $data->password = Hash::make('123456');
        $data->save();
    }
}
