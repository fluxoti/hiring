<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'ricardo',
            'email' => 'r.ruiz@fluxoti.com',
            'password' => bcrypt('fluxoti2009#'),
        ]);

        Model::reguard();

        $this->call('ClientsTableSeeder');
    }
}
