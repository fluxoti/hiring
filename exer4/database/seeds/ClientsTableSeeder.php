<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder {

    public function run(){

        DB::table('clients')->truncate();

        factory('App\Client', 7)->create();

    }

}