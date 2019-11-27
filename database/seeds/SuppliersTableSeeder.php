<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Supplier;
class SuppliersTableSeeder extends Seeder
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
    		Supplier::create([
    			'name'=>$fake->unique()->sentence(2),
    			// 'acronym'=>$fake->unique()->sentence(1),
    			'slug'=>$fake->unique()->slug,
    			'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    			'phone'=>$fake->phoneNumber,
    			'address'=>$fake->address,
    			'tax_code'=>$fake->shuffle('0123456789'),
    			'email'=>$fake->email,
    		]);
    	}
    }
}
