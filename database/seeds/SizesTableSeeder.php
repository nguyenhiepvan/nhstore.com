<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Size;
class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$fake = \Faker\Factory::create();
    	Size::create([
    		'name'=>'S',
    		// 'acronym'=>'s',
    		'slug'=>'s',
    		'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    	]);
    	Size::create([
    		'name'=>'M',
    		// 'acronym'=>'m',
    		'slug'=>'m',
    		'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    	]);
    	Size::create([
    		'name'=>'L',
    		// 'acronym'=>'l',
    		'slug'=>'l',
    		'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    	]);
    	Size::create([
    		'name'=>'XL',
    		// 'acronym'=>'xl',
    		'slug'=>'xl',
    		'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    	]);
    }
}
