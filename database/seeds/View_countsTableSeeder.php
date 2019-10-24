<?php

use Illuminate\Database\Seeder;
use nhstore\Models\View_count;
class View_countsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$fake = \Faker\Factory::create();
    	for ($i=0; $i < 20; $i++) {
    		View_count::create([
    			'product_id'=>$i+1,
    			'views'=>$fake->numberBetween($min = 20, $max = 200)
    		]);
    	}
    }
}
