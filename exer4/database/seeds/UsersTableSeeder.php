<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' =>  'teste@teste.com',
            'password' =>  Hash::make('password'),
            'created_at' =>  $faker->dateTime,
            'updated_at' =>  $faker->dateTime,
        ]);
    }
}