<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
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
       for ($i=0; $i < 200; $i++) {
       	\DB::table('todos')->insert([
       		'title' => $fake->text(10),
          'content' => $fake->text(20),
       		'user_id' => rand(1,21),
       	]);
       }
    }
}
