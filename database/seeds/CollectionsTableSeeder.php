<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Collection;
class CollectionsTableSeeder extends Seeder
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
    		$collection = Collection::create([
    			'name'=>$fake->unique()->sentence(3),
    			'slug'=>$fake->unique()->slug,
    			'1920x1056'=>$fake->imageUrl($width=1920, $height=1056,'fashion'),
                '450x362'=>$fake->imageUrl($width=450, $height=362,'fashion'),
                '540x494'=>$fake->imageUrl($width=540, $height=494,'fashion'),
                '540x340'=>$fake->imageUrl($width=540, $height=340,'fashion'),
            ]);
    		for ($j=0; $j < 3; $j++) { 
    			\DB::table('collection_products')->insert([
    				'collection_id'=>$collection->id,
    				'product_id'=>$i+1,
    			]);
    		}
    	}
    }
}
