<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Material;
class MaterialsTableSeeder extends Seeder
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
    		Material::create([
    			'name'=>$fake->unique()->sentence(2),
    			'acronym'=>$fake->unique()->sentence(1),
    			'slug'=>$fake->unique()->slug,
    			'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    		]);
    	}
    }
}
