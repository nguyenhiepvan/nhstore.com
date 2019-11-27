<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Color;
class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$fake = \Faker\Factory::create();
    	Color::create([
    		'name'=>'Xanh dương',
    		// 'acronym'=>'xd',
    		'slug'=>'xanh-duong',
    		'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    	]);
    	Color::create([
    		'name'=>'Trắng tinh',
    		// 'acronym'=>'tt',
    		'slug'=>'trang-tinh',
    		'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    	]);
    	Color::create([
    		'name'=>'Đỏ',
    		// 'acronym'=>'do',
    		'slug'=>'do',
    		'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    	]);
    	Color::create([
    		'name'=>'Tím',
    		// 'acronym'=>'Tim',
    		'slug'=>'tim',
    		'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    	]);
    }
}
