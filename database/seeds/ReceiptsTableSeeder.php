<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Receipt;
use nhstore\Models\Price;
class ReceiptsTableSeeder extends Seeder
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
    		$receipt = Receipt::create([
    			'type'=> 0,
    			'code' =>$fake->unique()->postcode,
    			'user_id'=>rand(1,10)
    		]);
    	}
    }
}
