<?php

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
        //
    	$fake = \Faker\Factory::create();
    	for ($i=0; $i < 20; $i++) {
    		\DB::table('users')->insert([
    			'name' => $fake->name,
    			'email' => $fake->email,
    			'password'=> bcrypt('12345678')
    		]);
    	}
    }
}
