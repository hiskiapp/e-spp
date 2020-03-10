<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = New User;
        $data->name = "Hiskia Anggi Puji Pratama";
        $data->username = 11700599;
        $data->password = Hash::make('wikrama');
        $data->gender = "Laki - Laki";
        $data->rombels_id = 1;
        $data->spp_id = 1;
        $data->save();
    }
}
