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
            'email' =>  $faker->email,
            'password' =>  Hash::make('password'),
            'created_at' =>  $faker->dateTimeBetween('+1 days', '+1 years'),
            'updated_at' =>  $faker->dateTimeBetween('+1 days', '+2 years'),
        ]);
    }
}
