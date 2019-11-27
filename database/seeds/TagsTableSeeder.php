<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Tag;
class TagsTableSeeder extends Seeder
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
    		Tag::create([
    			'name'=>$fake->unique()->country,
    			// 'acronym'=>$fake->unique()->sentence(1),
    			'slug'=>$fake->unique()->slug,
    			'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    		]);
    	}
    }
}
