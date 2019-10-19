<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Category;
class CategoriesTableSeeder extends Seeder
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
    		Category::create([
    			'name'=>$fake->unique()->sentence(3),
    			'acronym'=>$fake->unique()->sentence(3),
    			'slug'=>$fake->unique()->slug,
    			'user_id'=>1,
    			'cover'=>$fake->imageUrl($width = 1864, $height = 1024),
    		]);
    	}
    }
}
